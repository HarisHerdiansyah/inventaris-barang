<?php include "./layout/top.php" ?>

<main class="py-12">
    <form
        id="loginForm"
        class="mx-auto py-5 px-8 rounded-lg max-w-[500px] border border-2 border-gray-200 shadow">
        <p class="text-center text-2xl font-semibold mb-10">Login</p>
        <div class="space-y-6 mb-10">
            <div id="form-control" class="flex flex-col space-y-2">
                <label for="email">Email:</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    autocomplete="off"
                    class="border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-400 focus:border-blue-400 shadow-sm" />
            </div>
            <div id="form-control" class="flex flex-col space-y-2">
                <label for="password">Password:</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    autocomplete="off"
                    class="border border-2 border-gray-300 outline-none p-2 rounded-md focus:outline-none focus:ring focus:ring-blue-400 focus:border-blue-400 shadow-sm" />
            </div>
            <button
                type="submit"
                name="submit"
                class="mt-6 w-full px-4 py-2 text-lg bg-red-500 hover:bg-red-600 text-white rounded-md cursor-pointer">
                Masuk
            </button>
        </div>
    </form>
</main>


<?php include "./layout/bottom.php" ?>