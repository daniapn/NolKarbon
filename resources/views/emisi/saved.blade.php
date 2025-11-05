<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Data Saved</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Otomatis pindah ke halaman hasil setelah 2 detik
        setTimeout(() => {
            window.location.href = "/hasil-emisi";
        }, 2000);
    </script>
</head>
<body class="bg-[#f4efe9] flex flex-col items-center justify-center min-h-screen text-center font-sans">
    <div class="bg-white rounded-2xl shadow-lg p-8 w-[340px]">
        <h1 class="text-xl font-semibold mb-6 text-gray-800">Here’s your daily emissions 🌿</h1>

        <div class="flex flex-col items-center">
            <div class="w-20 h-20 rounded-full border-4 border-green-500 flex items-center justify-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" />
                </svg>
            </div>

            <p class="mt-4 text-lg font-semibold text-gray-800">Data saved</p>
        </div>

        <div class="mt-6">
            <a href="/hasil-emisi" class="bg-[#0b2d82] text-white px-6 py-2 rounded-lg hover:bg-[#163ea8]">View Result</a>
        </div>
    </div>

    <p class="text-sm text-gray-500 mt-6">NolKarbon</p>
</body>
</html>
