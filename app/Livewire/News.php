<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Berita;
use Carbon\Carbon;

class News extends Component
{
    use WithPagination;

    public $selectedDate;
    public $currentMonth;
    public $datesWithNews = [];
    public $perPage = 8;

    public function mount()
    {
        $this->selectedDate = now()->format('Y-m-d');
        $this->currentMonth = Carbon::parse($this->selectedDate)->startOfMonth();
        $this->fetchDatesWithNews();
    }

    public function selectDate($date)
    {
        $this->selectedDate = $date;
        $this->currentMonth = Carbon::parse($date)->startOfMonth();
        $this->fetchDatesWithNews();
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
        $this->fetchDatesWithNews();
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
        $this->fetchDatesWithNews();
        $this->resetPage();
    }

    public function fetchDatesWithNews()
    {
        $start = $this->currentMonth->copy()->startOfMonth()->format('Y-m-d');
        $end = $this->currentMonth->copy()->endOfMonth()->format('Y-m-d');

        $this->datesWithNews = Berita::whereBetween('tanggal', [$start, $end])
            ->where('is_active', 1)
            ->pluck('tanggal')
            ->map(fn($date) => Carbon::parse($date)->format('Y-m-d'))
            ->toArray();
    }

    public function getBeritasProperty()
    {
        return Berita::whereDate('tanggal', $this->selectedDate)
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
        return view('livewire.news', [
            'beritas' => $this->beritas
        ]);
    }
}
