<!-- filepath: /d:/COOLYEAH/Semester5/Project Utama/Website/Step-Off/resources/views/dashboard/welcome.blade.php -->

@extends('dashboard.layouts.main')

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Stock</h5>
                    <p class="card-text">Manage Stock</p>
                    <a href="/dashboard-stock" class="btn btn-primary">View Stock</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Orders</h5>
                    <p class="card-text">Manage orders</p>
                    <a href="/dashboard-order" class="btn btn-primary">View Orders</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Products</h5>
                    <p class="card-text">Manage products</p>
                    <a href="/dashboard-products" class="btn btn-primary">View Products</a>
                </div>
            </div>
        </div>
    </div>

    {{-- <div class="row mt-5">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Income vs Outcome</h5>
                    <canvas id="incomeOutcomeChart"></canvas>
                </div>
            </div>
        </div>
    </div> --}}
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const ctx = document.getElementById('incomeOutcomeChart').getContext('2d');
        const incomeOutcomeChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: @json($labels),
                datasets: [
                    {
                        label: 'Income',
                        data: @json($income),
                        borderColor: 'rgba(75, 192, 192, 1)',
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        fill: true,
                    },
                    {
                        label: 'Outcome',
                        data: @json($outcome),
                        borderColor: 'rgba(255, 99, 132, 1)',
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        fill: true,
                    }
                ]
            },
            options: {
                responsive: true,
                scales: {
                    x: {
                        beginAtZero: true
                    },
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    });
</script>
@endsection
