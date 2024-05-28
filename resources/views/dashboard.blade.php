<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-900 overflow-hidden shadow-xl sm:rounded-lg">
                <x-welcome />
            </div>
        </div>
    </div>

    <!-- Lock Screen Modal -->
    <div id="lockScreenModal" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
        <div class="bg-white p-6 rounded shadow-lg text-center">
            <p class="mb-4">Due to inactivity, your session has been locked.</p>
            <button onclick="unlockScreen()" class="bg-blue-500 text-white px-4 py-2 rounded">Unlock</button>
        </div>
    </div>

    <script>
        let inactivityTime = function () {
            let time;
            window.onload = resetTimer;
            document.onmousemove = resetTimer;
            document.onkeypress = resetTimer;

            function lockScreen() {
                document.getElementById("lockScreenModal").classList.remove("hidden");
            }

            function resetTimer() {
                clearTimeout(time);
                time = setTimeout(lockScreen, 5000); // Set timeout period to 5 minutes (300,000 milliseconds)
            }
        };

        function unlockScreen() {
            document.getElementById("lockScreenModal").classList.add("hidden");
            inactivityTime(); // Restart the inactivity timer
        }

        function openModal() {
            document.getElementById("myModal1").classList.remove("hidden");
        }

        function closeModal() {
            document.getElementById("myModal1").classList.add("hidden");
        }

        window.onload = function() {
            inactivityTime();
        };
    </script>
</x-app-layout>