<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Emission Calculator</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f4efe9] text-center font-sans">
    <div class="max-w-md mx-auto bg-white rounded-2xl shadow-lg p-6 mt-10">
        <h1 class="text-xl font-semibold mb-4 text-gray-800">Start calculating your daily emissions 🌿</h1>

        <form action="{{ route('hitung.emisi') }}" method="POST">
            @csrf

            <input type="text" name="nama_pengguna" placeholder="Your name" class="w-full border rounded-md p-2 mb-4" required>

            <div class="grid grid-cols-2 gap-4 text-left text-gray-700">
                <div>
                    <label>Transportation (kg CO₂)</label>
                    <input type="number" step="0.01" name="transportasi" class="w-full border rounded-md p-2 mt-1" required>
                </div>
                <div>
                    <label>Electricity (kg CO₂)</label>
                    <input type="number" step="0.01" name="listrik" class="w-full border rounded-md p-2 mt-1" required>
                </div>
                <div>
                    <label>Food (kg CO₂)</label>
                    <input type="number" step="0.01" name="makanan" class="w-full border rounded-md p-2 mt-1" required>
                </div>
                <div>
                    <label>Waste (kg CO₂)</label>
                    <input type="number" step="0.01" name="sampah" class="w-full border rounded-md p-2 mt-1" required>
                </div>
            </div>

            <button type="submit" class="mt-6 bg-[#0b2d82] text-white px-4 py-2 rounded-lg w-full hover:bg-[#163ea8]">
                Calculate Emissions
            </button>
        </form>

        <p class="text-sm text-gray-500 mt-4">NolKarbon</p>
    </div>
</body>
</html>
