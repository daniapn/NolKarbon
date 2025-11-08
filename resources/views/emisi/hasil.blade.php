<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Emission Result</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f4efe9] text-center font-sans">
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-lg p-6 mt-10">
        <h1 class="text-xl font-semibold text-gray-800 mb-4">Here’s your daily emissions 🌎</h1>

        <p class="text-lg text-gray-700">Hi, <b>{{ strtoupper($emisi->nama_pengguna) }}</b></p>
        <p class="text-2xl font-bold text-red-600 mt-3">{{ number_format($emisi->total_emisi, 2) }} kg CO₂</p>
        <p class="text-gray-500 text-sm mt-1">per day</p>

        <div class="bg-gray-100 p-4 mt-5 rounded-lg text-left text-sm">
            <p><b>Transportation:</b> {{ $emisi->transportasi }} kg CO₂</p>
            <p><b>Electricity:</b> {{ $emisi->listrik }} kg CO₂</p>
            <p><b>Food:</b> {{ $emisi->makanan }} kg CO₂</p>
            <p><b>Waste:</b> {{ $emisi->sampah }} kg CO₂</p>
        </div>

        <div class="mt-6">
            <a href="/kalkulator-emisi" class="bg-[#0b2d82] text-white px-4 py-2 rounded-lg hover:bg-[#163ea8]">Recalculate</a>
        </div>

        <p class="text-sm text-gray-500 mt-6">NolKarbon</p>
    </div>
</body>
</html>
