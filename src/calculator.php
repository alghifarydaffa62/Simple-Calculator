<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./output.css">
    <title>Simple Calculator</title>
</head>
<body class="bg-gray-900 flex justify-center flex-col items-center h-screen">
    <h1 class="text-3xl text-white mb-6 font-semibold">Simple <span class="text-sky-500">Calculator</span></h1>
    <div class="bg-gray-800 p-6 rounded-lg shadow-lg text-white w-72">
        <input type="text" id="display" 
            class="w-full p-3 text-right text-xl bg-gray-700 rounded-md mb-3" readonly>

        <div class="grid grid-cols-4 gap-2">
            <?php
                $buttons = [
                    "7", "8", "9", "/",
                    "4", "5", "6", "*",
                    "1", "2", "3", "-",
                    "0", "C", "=", "+"
                ];

                foreach ($buttons as $btn) {
                    echo "<button class='btn bg-gray-600 p-3 cursor-pointer rounded-md text-xl' onclick='press(\"$btn\")'>$btn</button>";
                }
            ?>
        </div>
    </div>
    <script>
        let display = document.getElementById('display')

        function press(value) {
            if (value === "C") {
                display.value = ""; 
            } else if (value === "=") {
                try {
                    let result = eval(display.value);

                    if (!Number.isInteger(result)) {
                        result = parseFloat(result.toFixed(4));
                    }
                    
                    display.value = result;
                } catch {
                    display.value = "Error"; 
                }
            } else {
                if (display.value === "0" && value !== "." && !isNaN(value)) {
                    display.value = value;
                } else {
                    display.value += value;
                }
            }
        }
    </script>
</body>
</html>