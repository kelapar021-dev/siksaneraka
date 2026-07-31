<?php

namespace App\Services;

class FuzzyLogicService
{
    // ─────────────────────────────────────────────
    //  FUNGSI KEANGGOTAAN (MEMBERSHIP FUNCTIONS)
    // ─────────────────────────────────────────────

    /**
     * Linear turun (Rendah): μ = (b - x) / (b - a)
     * Domain: [a, b], turun dari 1 ke 0
     */
    public function linearTurun(float $x, float $a, float $b): float
    {
        if ($x <= $a) return 1.0;
        if ($x >= $b) return 0.0;
        return ($b - $x) / ($b - $a);
    }

    /**
     * Linear naik (Tinggi): μ = (x - a) / (b - a)
     * Domain: [a, b], naik dari 0 ke 1
     */
    public function linearNaik(float $x, float $a, float $b): float
    {
        if ($x <= $a) return 0.0;
        if ($x >= $b) return 1.0;
        return ($x - $a) / ($b - $a);
    }

    /**
     * Segitiga (Sedang): μ = max(0, min((x-a)/(b-a), (c-x)/(c-b)))
     * Puncak di b, mulai naik di a, turun ke 0 di c
     */
    public function segitiga(float $x, float $a, float $b, float $c): float
    {
        if ($x <= $a || $x >= $c) return 0.0;
        if ($x == $b) return 1.0;
        if ($x < $b) return ($x - $a) / ($b - $a);
        return ($c - $x) / ($c - $b);
    }

    // ─────────────────────────────────────────────
    //  FUZZIFIKASI INPUT
    // ─────────────────────────────────────────────

    /**
     * Fuzzifikasi satu variabel input → [Rendah, Sedang, Tinggi]
     * Domain: 0 - 100
     */
    public function fuzzifikasiVariabel(float $nilai): array
    {
        return [
            'Rendah' => $this->linearTurun($nilai, 0, 50),
            'Sedang' => $this->segitiga($nilai, 40, 65, 90),
            'Tinggi' => $this->linearNaik($nilai, 70, 100),
        ];
    }

    /**
     * Fuzzifikasi seluruh input
     */
    public function fuzzifikasi(float $kehadiran, float $nilaiTugas, float $keaktifan): array
    {
        return [
            'kehadiran'      => $this->fuzzifikasiVariabel($kehadiran),
            'nilai_tugas'    => $this->fuzzifikasiVariabel($nilaiTugas),
            'keaktifan'      => $this->fuzzifikasiVariabel($keaktifan),
        ];
    }

    // ─────────────────────────────────────────────
    //  RULE BASE & INFERENSI (TSUKAMOTO)
    // ─────────────────────────────────────────────

    /**
     * Rule base: 27 rules (3³)
     * Format: [kehadiran, nilai_tugas, keaktifan] => output_label
     */
    public function getRules(): array
    {
        return [
            // Rendah-Rendah
            ['Rendah',  'Rendah',  'Rendah',  'Tidak Lulus'],
            ['Rendah',  'Rendah',  'Sedang',  'Tidak Lulus'],
            ['Rendah',  'Rendah',  'Tinggi',  'Marginal'],
            // Rendah-Sedang
            ['Rendah',  'Sedang',  'Rendah',  'Tidak Lulus'],
            ['Rendah',  'Sedang',  'Sedang',  'Marginal'],
            ['Rendah',  'Sedang',  'Tinggi',  'Marginal'],
            // Rendah-Tinggi
            ['Rendah',  'Tinggi',  'Rendah',  'Marginal'],
            ['Rendah',  'Tinggi',  'Sedang',  'Marginal'],
            ['Rendah',  'Tinggi',  'Tinggi',  'Lulus'],
            // Sedang-Rendah
            ['Sedang',  'Rendah',  'Rendah',  'Tidak Lulus'],
            ['Sedang',  'Rendah',  'Sedang',  'Marginal'],
            ['Sedang',  'Rendah',  'Tinggi',  'Marginal'],
            // Sedang-Sedang
            ['Sedang',  'Sedang',  'Rendah',  'Marginal'],
            ['Sedang',  'Sedang',  'Sedang',  'Lulus'],
            ['Sedang',  'Sedang',  'Tinggi',  'Lulus'],
            // Sedang-Tinggi
            ['Sedang',  'Tinggi',  'Rendah',  'Marginal'],
            ['Sedang',  'Tinggi',  'Sedang',  'Lulus'],
            ['Sedang',  'Tinggi',  'Tinggi',  'Lulus'],
            // Tinggi-Rendah
            ['Tinggi',  'Rendah',  'Rendah',  'Marginal'],
            ['Tinggi',  'Rendah',  'Sedang',  'Marginal'],
            ['Tinggi',  'Rendah',  'Tinggi',  'Lulus'],
            // Tinggi-Sedang
            ['Tinggi',  'Sedang',  'Rendah',  'Marginal'],
            ['Tinggi',  'Sedang',  'Sedang',  'Lulus'],
            ['Tinggi',  'Sedang',  'Tinggi',  'Lulus'],
            // Tinggi-Tinggi
            ['Tinggi',  'Tinggi',  'Rendah',  'Lulus'],
            ['Tinggi',  'Tinggi',  'Sedang',  'Lulus'],
            ['Tinggi',  'Tinggi',  'Tinggi',  'Lulus'],
        ];
    }

    /**
     * Output Tsukamoto: fungsi keanggotaan monotonik naik untuk output
     * α → Z berdasarkan label output
     */
    public function outputTsukamoto(string $label, float $alpha): float
    {
        return match ($label) {
            'Tidak Lulus' => 20 + (30 * $alpha),  // 20 - 50
            'Marginal'    => 30 + (40 * $alpha),   // 30 - 70
            'Lulus'       => 60 + (40 * $alpha),   // 60 - 100
            default       => 50.0,
        };
    }

    // ─────────────────────────────────────────────
    //  INFERENSI & DEFUZZIFIKASI (TSUKAMOTO)
    // ─────────────────────────────────────────────

    /**
     * Hitung inferensi Tsukamoto: α = min(μ1, μ2, μ3), Z = output(α)
     * Return array of [rule_index, alpha, z, label]
     */
    public function inferensi(array $fuzzified): array
    {
        $rules = $this->getRules();
        $results = [];

        foreach ($rules as $i => $rule) {
            [$kehadiranLabel, $tugasLabel, $diskusiLabel, $outputLabel] = $rule;

            $muKehadiran  = $fuzzified['kehadiran'][$kehadiranLabel];
            $muTugas      = $fuzzified['nilai_tugas'][$tugasLabel];
            $muDiskusi    = $fuzzified['keaktifan'][$diskusiLabel];

            $alpha = min($muKehadiran, $muTugas, $muDiskusi);
            $z     = $this->outputTsukamoto($outputLabel, $alpha);

            $results[] = [
                'rule'        => $i + 1,
                'kehadiran'   => $kehadiranLabel,
                'tugas'       => $tugasLabel,
                'diskusi'     => $diskusiLabel,
                'output'      => $outputLabel,
                'mu1'         => $muKehadiran,
                'mu2'         => $muTugas,
                'mu3'         => $muDiskusi,
                'alpha'       => $alpha,
                'z'           => $z,
            ];
        }

        return $results;
    }

    /**
     * Defuzzifikasi Tsukamoto:
     * Z = Σ(αi × Zi) / Σ(αi)
     */
    public function defuzzifikasi(array $inferenceResults): float
    {
        $totals = $this->hitungTotalAlpha($inferenceResults);
        return $totals['total_alpha'] > 0 ? round($totals['total_alpha_z'] / $totals['total_alpha'], 2) : 0;
    }

    /**
     * Hitung total α×Z dan total α
     */
    public function hitungTotalAlpha(array $inferenceResults): array
    {
        $totalAlphaZ = 0.0;
        $totalAlpha  = 0.0;

        foreach ($inferenceResults as $r) {
            if ($r['alpha'] > 0) {
                $totalAlphaZ += $r['alpha'] * $r['z'];
                $totalAlpha  += $r['alpha'];
            }
        }

        return [
            'total_alpha_z' => round($totalAlphaZ, 4),
            'total_alpha'   => round($totalAlpha, 4),
        ];
    }

    /**
     * Menentukan keterangan berdasarkan skor
     */
    public function getKeterangan(float $skor): string
    {
        if ($skor >= 65) return 'Lulus';
        if ($skor >= 45) return 'Marginal';
        return 'Tidak Lulus';
    }

    /**
     * Menghitung semuanya sekaligus
     */
    public function hitung(float $kehadiran, float $nilaiTugas, float $keaktifan): array
    {
        $fuzzified    = $this->fuzzifikasi($kehadiran, $nilaiTugas, $keaktifan);
        $inference    = $this->inferensi($fuzzified);
        $totals       = $this->hitungTotalAlpha($inference);
        $skor         = $totals['total_alpha'] > 0 ? round($totals['total_alpha_z'] / $totals['total_alpha'], 2) : 0;
        $keterangan   = $this->getKeterangan($skor);

        // Filter rules yang aktif (alpha > 0)
        $activeRules = array_filter($inference, fn($r) => $r['alpha'] > 0);

        return [
            'fuzzified'      => $fuzzified,
            'inference'      => $inference,
            'active_rules'   => array_values($activeRules),
            'skor'           => $skor,
            'keterangan'     => $keterangan,
            'total_alpha_z'  => $totals['total_alpha_z'],
            'total_alpha'    => $totals['total_alpha'],
        ];
    }
}
