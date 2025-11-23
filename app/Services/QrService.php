<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QrService
{
    /**
     * Generate a PNG QR with optional logo overlay using GD.
     *
     * @param string $text
     * @param string|resource|null $logo - path relative to storage/app/public OR binary string (Storage::get)
     * @param int $size
     * @param float $logoScale (0-1)
     * @return string binary PNG
     */
    public function generateQrWithLogo($text, $logo = null, $size = 300, $logoScale = 0.3)
    {
        // Generate QR binary
        $qrBinary = QrCode::format('png')->size($size)->margin(5)->generate($text);

        $qrImg = imagecreatefromstring($qrBinary);
        if (! $qrImg) {
            throw new \RuntimeException('Unable to create QR image');
        }

        if ($logo) {
            // If $logo is a path in storage public
            if (is_string($logo) && Storage::exists('public/' . $logo)) {
                $logoBinary = Storage::get('public/' . $logo);
            } elseif (is_string($logo)) {
                // maybe binary string passed directly
                $logoBinary = $logo;
            } else {
                $logoBinary = $logo;
            }

            $logoImg = @imagecreatefromstring($logoBinary);
            if ($logoImg) {
                $qrW = imagesx($qrImg);
                $qrH = imagesy($qrImg);

                $origLogoW = imagesx($logoImg);
                $origLogoH = imagesy($logoImg);

                $logoW = (int) ($qrW * $logoScale);
                $logoH = (int) ($logoW * ($origLogoH / $origLogoW));

                $dstX = (int) (($qrW - $logoW) / 2);
                $dstY = (int) (($qrH - $logoH) / 2);

                $logoResized = imagecreatetruecolor($logoW, $logoH);
                imagesavealpha($logoResized, true);
                $trans_colour = imagecolorallocatealpha($logoResized, 0, 0, 0, 127);
                imagefill($logoResized, 0, 0, $trans_colour);

                imagecopyresampled($logoResized, $logoImg, 0, 0, 0, 0, $logoW, $logoH, $origLogoW, $origLogoH);

                imagecopy($qrImg, $logoResized, $dstX, $dstY, 0, 0, $logoW, $logoH);

                imagedestroy($logoResized);
                imagedestroy($logoImg);
            }
        }

        ob_start();
        imagepng($qrImg);
        $result = ob_get_clean();

        imagedestroy($qrImg);

        return $result;
    }
}
