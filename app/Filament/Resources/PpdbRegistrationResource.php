<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PpdbRegistrationResource\Pages;
use App\Models\PpdbRegistration;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Filters\SelectFilter;
use Filament\Notifications\Notification;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class PpdbRegistrationResource extends Resource
{
    protected static ?string $model = PpdbRegistration::class;
    protected static ?string $navigationIcon = 'heroicon-o-academic-cap';
    protected static ?string $navigationLabel = 'Data Pendaftar PPDB';
    protected static ?string $modelLabel = 'Pendaftar PPDB';
    protected static ?string $pluralModelLabel = 'Data Pendaftar PPDB';
    protected static ?string $navigationGroup = 'Manajemen PPDB';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Section::make('Data Siswa')
                ->schema([
                    Forms\Components\TextInput::make('registration_number')
                        ->label('Nomor Registrasi')
                        ->disabled()
                        ->dehydrated(false),

                    Forms\Components\TextInput::make('student_name')
                        ->label('Nama Lengkap Siswa')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('nisn')
                        ->label('NISN')
                        ->maxLength(20),

                    Forms\Components\TextInput::make('birth_place')
                        ->label('Tempat Lahir')
                        ->required()
                        ->maxLength(100),

                    Forms\Components\DatePicker::make('birth_date')
                        ->label('Tanggal Lahir')
                        ->required()
                        ->maxDate(now()),

                    Forms\Components\Select::make('gender')
                        ->label('Jenis Kelamin')
                        ->options(['L' => 'Laki-laki', 'P' => 'Perempuan'])
                        ->required(),

                    Forms\Components\Select::make('religion')
                        ->label('Agama')
                        ->options([
                            'Islam'     => 'Islam',
                            'Kristen'   => 'Kristen',
                            'Katolik'   => 'Katolik',
                            'Hindu'     => 'Hindu',
                            'Buddha'    => 'Buddha',
                            'Konghucu'  => 'Konghucu',
                        ])
                        ->default('Islam')
                        ->required(),

                    Forms\Components\TextInput::make('previous_school')
                        ->label('Asal Sekolah (TK/RA)')
                        ->maxLength(255),
                ])->columns(2),

            Forms\Components\Section::make('Data Orang Tua / Wali')
                ->schema([
                    Forms\Components\TextInput::make('parent_name')
                        ->label('Nama Orang Tua / Wali')
                        ->required()
                        ->maxLength(255),

                    Forms\Components\TextInput::make('parent_phone')
                        ->label('Nomor Telepon / WhatsApp')
                        ->required()
                        ->tel()
                        ->maxLength(20),

                    Forms\Components\Textarea::make('address')
                        ->label('Alamat Lengkap')
                        ->required()
                        ->rows(3)
                        ->columnSpanFull(),
                ])->columns(2),

            Forms\Components\Section::make('Status Pendaftaran')
                ->schema([
                    Forms\Components\Select::make('status')
                        ->label('Status')
                        ->options([
                            'pending'  => 'Menunggu',
                            'verified' => 'Terverifikasi',
                            'accepted' => 'Diterima',
                            'rejected' => 'Ditolak',
                        ])
                        ->required(),
                ]),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('registration_number')
                    ->label('No. Registrasi')
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('student_name')
                    ->label('Nama Siswa')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('gender')
                    ->label('L/P')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'L' => 'info',
                        'P' => 'pink',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => $state === 'L' ? 'Laki-laki' : 'Perempuan'),

                Tables\Columns\TextColumn::make('parent_name')
                    ->label('Nama Orang Tua')
                    ->searchable(),

                Tables\Columns\TextColumn::make('parent_phone')
                    ->label('No. Telepon')
                    ->searchable(),

                Tables\Columns\BadgeColumn::make('status')
                    ->label('Status')
                    ->colors([
                        'warning' => 'pending',
                        'info'    => 'verified',
                        'success' => 'accepted',
                        'danger'  => 'rejected',
                    ])
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending'  => 'Menunggu',
                        'verified' => 'Terverifikasi',
                        'accepted' => 'Diterima',
                        'rejected' => 'Ditolak',
                        default    => $state,
                    }),

                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal Daftar')
                    ->dateTime('d M Y, H:i')
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->label('Status')
                    ->options([
                        'pending'  => 'Menunggu',
                        'verified' => 'Terverifikasi',
                        'accepted' => 'Diterima',
                        'rejected' => 'Ditolak',
                    ]),

                SelectFilter::make('gender')
                    ->label('Jenis Kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ]),
            ])
            ->actions([
                Tables\Actions\Action::make('accept')
                    ->label('Terima')
                    ->icon('heroicon-o-check-badge')
                    ->color('success')
                    ->requiresConfirmation()
                    ->modalHeading('Terima Pendaftar')
                    ->modalDescription('Apakah Anda yakin ingin menerima pendaftar ini?')
                    ->visible(fn (PpdbRegistration $record) => $record->status !== 'accepted')
                    ->action(function (PpdbRegistration $record) {
                        $record->update(['status' => 'accepted']);
                        Notification::make()
                            ->title('Pendaftar berhasil diterima!')
                            ->success()
                            ->send();
                    }),

                Tables\Actions\Action::make('reject')
                    ->label('Tolak')
                    ->icon('heroicon-o-x-circle')
                    ->color('danger')
                    ->requiresConfirmation()
                    ->modalHeading('Tolak Pendaftar')
                    ->modalDescription('Apakah Anda yakin ingin menolak pendaftar ini?')
                    ->visible(fn (PpdbRegistration $record) => $record->status !== 'rejected')
                    ->action(function (PpdbRegistration $record) {
                        $record->update(['status' => 'rejected']);
                        Notification::make()
                            ->title('Pendaftar ditolak.')
                            ->danger()
                            ->send();
                    }),

                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\BulkAction::make('accept_bulk')
                        ->label('Terima Semua')
                        ->icon('heroicon-o-check-badge')
                        ->color('success')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['status' => 'accepted'])),

                    Tables\Actions\BulkAction::make('reject_bulk')
                        ->label('Tolak Semua')
                        ->icon('heroicon-o-x-circle')
                        ->color('danger')
                        ->requiresConfirmation()
                        ->action(fn ($records) => $records->each->update(['status' => 'rejected'])),

                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index'  => Pages\ListPpdbRegistrations::route('/'),
            'create' => Pages\CreatePpdbRegistration::route('/create'),
            'view'   => Pages\ViewPpdbRegistration::route('/{record}'),
            'edit'   => Pages\EditPpdbRegistration::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::where('status', 'pending')->count() ?: null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }
}
