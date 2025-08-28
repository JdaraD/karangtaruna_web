<?php

namespace App\Filament\Exports;

use App\Models\Kegiatan;
use App\Models\PengajuanKegiatan;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Filament\Actions\Exports\ExportColumn;

class KegiatanExporter extends Exporter
{
    protected static ?string $model = PengajuanKegiatan::class;

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('id')->label('ID'),
            ExportColumn::make('nama_kegiatan')->label('Nama Kegiatan'),
            ExportColumn::make('tanggal')->label('Tanggal'),
            ExportColumn::make('created_at')->label('Dibuat'),
        ];
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $body = 'Export kegiatan selesai. ' . number_format($export->successful_rows) . ' ' . str('row')->plural($export->successful_rows) . ' berhasil diekspor.';

        if ($failedRowsCount = $export->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' gagal diekspor.';
        }

        return $body;
    }
}
