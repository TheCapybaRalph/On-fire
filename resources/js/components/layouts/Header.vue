<script setup lang="ts">
import { Link, router } from '@inertiajs/vue3';
import { login, register } from '@/routes';
</script>

<template>
    <div class="flex w-full px-2 sm:px-5">
        <div
            class="flex w-full items-center justify-between rounded-3xl border border-[#0D7FF230] bg-transparent p-2 !px-7 sm:p-3.5"
        >
            <div class="brand flex items-center gap-4">
                <div class="relative">
                    <div
                        class="absolute -inset-0.5 rounded-lg bg-blue-500 opacity-50 blur"
                    ></div>
                    <div
                        class="bg-main-color relative flex size-10 items-center justify-center rounded-xl p-2"
                    >
                        <svg
                            class="size-6 text-white"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z"
                            />
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M12 18a3.75 3.75 0 0 0 .495-7.468 5.99 5.99 0 0 0-1.925 3.547 5.975 5.975 0 0 1-2.133-1.001A3.75 3.75 0 0 0 12 18Z"
                            />
                        </svg>
                    </div>
                </div>
                <p class="text-xl font-bold text-white">
                    OnFire<span class="main-color">Monitor</span>
                </p>
            </div>
            <div class="main-menu flex gap-8 font-bold text-white">
                <a href="">Platform</a>
                <a href="">Solutions</a>
                <a href="">Network</a>
                <a href="">API</a>
            </div>
            <div
                class="account-actions flex items-center gap-8 font-medium text-white"
            >
                <Link :href="login()">Login</Link>
                <div class="group relative cursor-pointer">
                    <div
                        class="absolute inset-0 scale-95 rounded-xl bg-blue-500 opacity-0 blur transition-all duration-300 group-hover:scale-100 group-hover:opacity-70"
                    ></div>
                    <Link :href="register()" class="relative rounded-xl bg-[#0D7FF2] p-2 px-5"
                        >Start Monitoring</Link
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>
.main-color {
    color: #0d7ff2;
}

.bg-main-color {
    background-color: #0d7ff2;
}
</style>
