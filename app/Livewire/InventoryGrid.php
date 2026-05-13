<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Fabric;

class InventoryGrid extends Component
{
    public string $search = '';
    public string $filterCategory = 'all';
    public string $filterStatus = 'all';
    public bool $showAddModal = false;
    public bool $showEditModal = false;

    // Form fields
    public $editingId;
    public string $newName = '';
    public string $newCategory = 'Silk';
    public int $newStock = 0;
    public int $newPrice = 0;
    public string $newColor = '#c8a96e';

    protected $listeners = ['stock-added' => '$refresh', 'price-updated' => '$refresh'];

    public function addStock(): void
    {
        $this->validate([
            'newName' => 'required|min:3',
            'newCategory' => 'required',
            'newStock' => 'required|integer|min:1|max:100',
            'newPrice' => 'required|integer|min:1',
        ]);

        $status = $this->calculateStatus($this->newStock);

        Fabric::create([
            'name' => $this->newName,
            'category' => $this->newCategory,
            'stock' => $this->newStock,
            'price' => $this->newPrice,
            'color' => $this->newColor,
            'color2' => $this->newColor,
            'status' => $status,
            'rolls' => (int) round($this->newStock * 0.4),
        ]);

        $this->reset(['newName', 'newCategory', 'newStock', 'newPrice', 'newColor', 'showAddModal']);
        $this->dispatch('stock-added');
    }

    public function edit(int $id): void
    {
        $fabric = Fabric::findOrFail($id);
        $this->editingId = $id;
        $this->newName = $fabric->name;
        $this->newCategory = $fabric->category;
        $this->newStock = $fabric->stock;
        $this->newPrice = $fabric->price;
        $this->newColor = $fabric->color;
        $this->showEditModal = true;
    }

    public function update(): void
    {
        $this->validate([
            'newName' => 'required|min:3',
            'newPrice' => 'required|integer|min:1',
        ]);

        $fabric = Fabric::findOrFail($this->editingId);
        $fabric->update([
            'name' => $this->newName,
            'category' => $this->newCategory,
            'stock' => $this->newStock,
            'price' => $this->newPrice,
            'color' => $this->newColor,
            'status' => $this->calculateStatus($this->newStock),
        ]);

        $this->reset(['editingId', 'newName', 'newCategory', 'newStock', 'newPrice', 'newColor', 'showEditModal']);
    }

    public function delete(int $id): void
    {
        Fabric::destroy($id);
        $this->dispatch('stock-added'); // Refresh grid
    }

    private function calculateStatus(int $stock): string
    {
        if ($stock < 20) return 'Critical';
        if ($stock < 40) return 'Low Stock';
        return 'In Stock';
    }

    public function render()
    {
        $query = Fabric::query();
        if ($this->search) {
            $query->where('name', 'like', '%' . $this->search . '%');
        }
        if ($this->filterCategory !== 'all') {
            $query->where('category', $this->filterCategory);
        }
        if ($this->filterStatus !== 'all') {
            $query->where('status', $this->filterStatus);
        }

        return view('livewire.inventory-grid', [
            'filteredFabrics' => $query->latest()->get(),
            'categories' => ['all', 'Silk', 'Cotton', 'Velvet', 'Brocade', 'Linen', 'Wool'],
            'statuses' => ['all', 'In Stock', 'Low Stock', 'Critical'],
        ]);
    }
}
