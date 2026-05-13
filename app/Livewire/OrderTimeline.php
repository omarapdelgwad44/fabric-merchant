<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Order;
use App\Models\Fabric;

class OrderTimeline extends Component
{
    public string $search = '';
    public string $selectedOrder = '';
    public bool $showAddOrderModal = false;

    // Form fields
    public string $clientName = '';
    public string $fabricName = '';
    public string $quantity = '';
    public string $totalAmount = '';

    public function mount()
    {
        $firstOrder = Order::latest()->first();
        if ($firstOrder) {
            $this->selectedOrder = $firstOrder->order_number;
        }
    }

    public function advanceOrder(string $orderNumber): void
    {
        $order = Order::where('order_number', $orderNumber)->firstOrFail();
        $timeline = $order->timeline;
        
        $nextStepIdx = -1;
        foreach ($timeline as $idx => $step) {
            if (!$step['done']) {
                $nextStepIdx = $idx;
                break;
            }
        }

        if ($nextStepIdx !== -1) {
            $timeline[$nextStepIdx]['done'] = true;
            $timeline[$nextStepIdx]['date'] = now()->format('M j, H:i');
            
            // Update status based on the current step
            $order->status = $timeline[$nextStepIdx]['step'];
            $order->timeline = $timeline;
            $order->save();
        }
    }

    public function deleteOrder(string $orderNumber): void
    {
        Order::where('order_number', $orderNumber)->delete();
        if ($this->selectedOrder === $orderNumber) {
            $this->selectedOrder = Order::latest()->first()?->order_number ?? '';
        }
    }

    public function createOrder(): void
    {
        $this->validate([
            'clientName' => 'required|min:3',
            'fabricName' => 'required',
            'quantity' => 'required',
            'totalAmount' => 'required',
        ]);

        $orderNumber = 'ORD-' . rand(1000, 9999);

        Order::create([
            'order_number' => $orderNumber,
            'client' => $this->clientName,
            'fabric_name' => $this->fabricName,
            'qty' => $this->quantity . 'm',
            'total' => '$' . number_format($this->totalAmount),
            'status' => 'Processing',
            'timeline' => [
                ['step' => 'Order Placed', 'date' => now()->format('M j, H:i'), 'done' => true, 'icon' => '📋'],
                ['step' => 'Payment Confirmed', 'date' => 'Pending', 'done' => false, 'icon' => '💳'],
                ['step' => 'Fabric Cutting', 'date' => 'Pending', 'done' => false, 'icon' => '✂️'],
                ['step' => 'Quality Inspection', 'date' => 'Pending', 'done' => false, 'icon' => '🔍'],
                ['step' => 'Packaging', 'date' => 'Pending', 'done' => false, 'icon' => '📦'],
                ['step' => 'Shipped', 'date' => 'Pending', 'done' => false, 'icon' => '🚚'],
                ['step' => 'Delivered', 'date' => 'Pending', 'done' => false, 'icon' => '🏠'],
            ]
        ]);

        $this->selectedOrder = $orderNumber;
        $this->reset(['clientName', 'fabricName', 'quantity', 'totalAmount', 'showAddOrderModal']);
    }

    public function render()
    {
        $query = Order::query();

        if ($this->search) {
            $query->where(function($q) {
                $q->where('order_number', 'like', '%' . $this->search . '%')
                  ->orWhere('client', 'like', '%' . $this->search . '%');
            });
        }

        $orders = $query->latest()->get();
        $selectedOrderData = Order::where('order_number', $this->selectedOrder)->first() ?? $orders->first();

        return view('livewire.order-timeline', [
            'selectedOrderData' => $selectedOrderData,
            'filteredOrders' => $orders,
            'fabrics' => Fabric::all()
        ]);
    }
}
