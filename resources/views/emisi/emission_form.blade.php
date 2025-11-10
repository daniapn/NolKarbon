@extends('layouts.app')

@section('content')
<div class="min-h-screen flex flex-col bg-[#EAE0D5]">

    <!-- MAIN CONTENT -->
    <div class="flex-1 flex flex-col items-center justify-center py-10">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-extrabold text-gray-900">
                Start calculating <br> your daily emissions 🌍
            </h1>
        </div>

        <!-- FORM CONTAINER -->
        <div class="bg-white rounded-3xl shadow-md p-8 w-[90%] max-w-5xl">

            <form action="{{ route('emissions.store') }}" method="POST" class="space-y-8">
                @csrf

                <!-- TRANSPORTATION -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="border-[3px] border-[#D6C7F7] rounded-2xl p-6">
                        <h2 class="text-lg font-semibold mb-3">Transportation 🛵</h2>
                        <div class="flex gap-4 mb-4">
                            <label>
                                <input type="radio" name="vehicle_type" value="motorcycle" checked>
                                Motorcycle
                            </label>
                            <label>
                                <input type="radio" name="vehicle_type" value="car">
                                Car
                            </label>
                        </div>
                        <label class="block text-sm font-medium text-gray-600">Avg distance (km)</label>
                        <input type="number" name="distance" step="0.1"
                               class="w-full mt-2 p-2 rounded-xl bg-[#EFE7DF]" placeholder="Type here...">
                    </div>

                    <!-- ELECTRICITY -->
                    <div class="border-[3px] border-[#D6C7F7] rounded-2xl p-6">
                        <h2 class="text-lg font-semibold mb-3">Electricity ⚡</h2>
                        <div class="flex gap-4 mb-4">
                            <label>
                                <input type="radio" name="electric_source" value="grid" checked>
                                Grid Electricity
                            </label>
                            <label>
                                <input type="radio" name="electric_source" value="solar">
                                Solar Power
                            </label>
                        </div>
                        <label class="block text-sm font-medium text-gray-600">Daily Power Usage (kWh)</label>
                        <input type="number" name="electric_usage" step="0.1"
                               class="w-full mt-2 p-2 rounded-xl bg-[#EFE7DF]" placeholder="Type here...">
                    </div>
                </div>

                <!-- FOOD & RUBBISH -->
                <div class="grid md:grid-cols-2 gap-6">
                    <div class="border-[3px] border-[#D6C7F7] rounded-2xl p-6">
                        <h2 class="text-lg font-semibold mb-3">Food 🍽️</h2>
                        <label class="block text-sm font-medium text-gray-600">Beef (kg)</label>
                        <input type="number" name="beef" step="0.1"
                               class="w-full mt-2 p-2 rounded-xl bg-[#EFE7DF]" placeholder="Type here...">
                        <label class="block text-sm font-medium text-gray-600 mt-4">Chicken (kg)</label>
                        <input type="number" name="chicken" step="0.1"
                               class="w-full mt-2 p-2 rounded-xl bg-[#EFE7DF]" placeholder="Type here...">
                    </div>

                    <div class="border-[3px] border-[#D6C7F7] rounded-2xl p-6">
                        <h2 class="text-lg font-semibold mb-3">Rubbish 🗑️</h2>
                        <label class="block text-sm font-medium text-gray-600">Organic Waste (kg)</label>
                        <input type="number" name="organic_waste" step="0.1"
                               class="w-full mt-2 p-2 rounded-xl bg-[#EFE7DF]" placeholder="Type here...">
                        <label class="block text-sm font-medium text-gray-600 mt-4">Inorganic Waste (kg)</label>
                        <input type="number" name="inorganic_waste" step="0.1"
                               class="w-full mt-2 p-2 rounded-xl bg-[#EFE7DF]" placeholder="Type here...">
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="flex justify-center mt-8">
                    <button type="submit"
                            class="bg-[#001A72] text-white font-semibold px-10 py-3 rounded-full shadow-md hover:scale-105 transition">
                        Start Calculate
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- FOOTER -->
    <footer class="bg-[#001A72] py-6">
        <div class="container mx-auto flex justify-center md:justify-between items-center px-6 text-white">
            <div class="flex items-center space-x-3">
                <img src="/images/nolkarbon-logo.png" alt="Nol Karbon" class="w-28">
            </div>
            <div class="text-sm font-medium mt-4 md:mt-0">
                Contact Us
            </div>
        </div>
    </footer>

</div>
@endsection
