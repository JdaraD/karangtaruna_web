<?php

namespace App\Livewire;

use App\Models\Berita;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Calendar extends Component
{
     use WithPagination;

    public $selectedDate;
    public $currentMonth;
    public $datesWithKolaborasi = [];
    public $perPage = 6;
    public $programId;

    public function mount($programId)
    {
        $this->programId = $programId;
        $this->selectedDate = now()->format('Y-m-d');
        $this->currentMonth = Carbon::parse($this->selectedDate)->startOfMonth();
        $this->fetchDatesWithKolaborasi();
    }

    public function selectDate($date)
    {
        $this->selectedDate = $date;
        $this->currentMonth = Carbon::parse($date)->startOfMonth();
        $this->fetchDatesWithKolaborasi();
        $this->resetPage();
    }

    public function previousMonth()
    {
        $this->currentMonth = $this->currentMonth->copy()->subMonth();

        $day = Carbon::parse($this->selectedDate)->day;
        $newDate = $this->currentMonth->copy()->addDays($day - 1);

        if ($newDate->month !== $this->currentMonth->month) {
            $newDate = $this->currentMonth->copy()->endOfMonth();
        }

        $this->selectedDate = $newDate->format('Y-m-d');
        $this->fetchDatesWithKolaborasi();
        $this->resetPage();
    }

    public function nextMonth()
    {
        $this->currentMonth = $this->currentMonth->copy()->addMonth();

        $day = Carbon::parse($this->selectedDate)->day;
        $newDate = $this->currentMonth->copy()->addDays($day - 1);

        if ($newDate->month !== $this->currentMonth->month) {
            $newDate = $this->currentMonth->copy()->endOfMonth();
        }

        $this->selectedDate = $newDate->format('Y-m-d');
        $this->fetchDatesWithKolaborasi();
        $this->resetPage();
    }

    public function fetchDatesWithKolaborasi()
    {
        $start = $this->currentMonth->copy()->startOfMonth()->format('Y-m-d');
        $end = $this->currentMonth->copy()->endOfMonth()->format('Y-m-d');

        $this->datesWithKolaborasi = Kolaborasi::where('program_id', $this->programId)
            ->whereBetween('tanggal', [$start, $end])
            ->where('is_active', 1)
            ->pluck('tanggal')
            ->map(fn($date) => Carbon::parse($date)->format('Y-m-d'))
            ->toArray();
    }

    public function getProgramsProperty()
    {
        return Kolaborasi::where('program_id', $this->programId)
            ->whereDate('tanggal', $this->selectedDate)
            ->where('is_active', 1)
            ->latest()
            ->paginate($this->perPage);
    }

    public function updatedPerPage()
    {
        $this->resetPage();
    }

    public function render()
    {
        return view('livewire.kolaborasi-calendar', [
            'programs' => $this->programs,
        ]);
    }
}
