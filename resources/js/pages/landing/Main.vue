<script setup lang="ts">
import Header from '@/components/layouts/Header.vue';
import MainLandingPage from '@/components/content/landing/MainLandingPage.vue';
</script>

<template>
    <div class="bg-lp-background">
        <div class="bg-radial from-sky-900 to-[#101922] to-70%">
            <div class="pt-3">
                <Header />
            </div>

            <MainLandingPage></MainLandingPage>
        </div>
        <div class="flex min-h-screen justify-center">
            <div class="container-sm p-5">
                <div class="relative">
                    <div
                        class="relative rounded-lg bg-lp-background shadow-lp-primary"
                    >
                        <div class="grid grid-cols-2">
                            <div class="p-16">
                                <p
                                    class="mb-10 text-6xl font-bold tracking-tight text-white"
                                >
                                    Multiple Notification <br />
                                    Channels
                                </p>
                                <div class="flex flex-col gap-4 text-gray-400 ml-5">
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="rounded-xl bg-lp-primary/40 p-2 text-white"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="size-5"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0"
                                                />
                                            </svg>
                                        </div>
                                        <p
                                            class="text-sm font-light tracking-wide"
                                        >
                                            Connect notifications to pages
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="rounded-xl bg-lp-primary/40 p-2 text-white"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="size-5"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z"
                                                />
                                            </svg>
                                        </div>
                                        <p
                                            class="text-sm font-light tracking-wide"
                                        >
                                            Assign to users or teams
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <div
                                            class="rounded-xl bg-lp-primary/40 p-2 text-white"
                                        >
                                            <svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                fill="none"
                                                viewBox="0 0 24 24"
                                                stroke-width="1.5"
                                                stroke="currentColor"
                                                class="size-5"
                                            >
                                                <path
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                    d="M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25"
                                                />
                                            </svg>
                                        </div>
                                        <p
                                            class="text-sm font-light tracking-wide"
                                        >
                                            Include runbooks for guidance
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div
                                class="bg-radial from-lp-accent to-lp-background to-60% p-12"
                            >
                                <div class="flex w-full flex-col gap-8 justify-center h-full">
                                    <div
                                        class="flex w-fit animate-pulse items-center gap-4 self-end rounded-md border border-gray-400 bg-white/10 p-4 text-gray-400"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="size-5"
                                        >
                                            <rect
                                                width="3"
                                                height="8"
                                                x="13"
                                                y="2"
                                                rx="1.5"
                                            />
                                            <path
                                                d="M19 8.5V10h1.5A1.5 1.5 0 1 0 19 8.5"
                                            />
                                            <rect
                                                width="3"
                                                height="8"
                                                x="8"
                                                y="14"
                                                rx="1.5"
                                            />
                                            <path
                                                d="M5 15.5V14H3.5A1.5 1.5 0 1 0 5 15.5"
                                            />
                                            <rect
                                                width="8"
                                                height="3"
                                                x="14"
                                                y="13"
                                                rx="1.5"
                                            />
                                            <path
                                                d="M15.5 19H14v1.5a1.5 1.5 0 1 0 1.5-1.5"
                                            />
                                            <rect
                                                width="8"
                                                height="3"
                                                x="2"
                                                y="8"
                                                rx="1.5"
                                            />
                                            <path
                                                d="M8.5 5H10V3.5A1.5 1.5 0 1 0 8.5 5"
                                            />
                                        </svg>
                                        <p class="text-xs">
                                            Your page:
                                            https://example.com/new-campaign
                                            <br />
                                            is on fire
                                        </p>
                                    </div>
                                    <div
                                        class="flex w-fit items-center gap-4 rounded-md border border-gray-400 bg-white/10 p-4 text-gray-400"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke-width="1.5"
                                            stroke="currentColor"
                                            class="size-5"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                d="M16.5 12a4.5 4.5 0 1 1-9 0 4.5 4.5 0 0 1 9 0Zm0 0c0 1.657 1.007 3 2.25 3S21 13.657 21 12a9 9 0 1 0-2.636 6.364M16.5 12V8.25"
                                            />
                                        </svg>
                                        <p class="text-xs">
                                            Your Campaign: NewProductsQ1 is
                                            having an issue<br />
                                            refer to runbook:
                                            https://custom-runbook.com/npq1-what-to-do
                                        </p>
                                    </div>
                                    <div
                                        class="flex w-fit items-center gap-4 self-center rounded-md border border-gray-400 bg-white/10 p-4 text-gray-400"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            width="24"
                                            height="24"
                                            viewBox="0 0 24 24"
                                            fill="none"
                                            stroke="currentColor"
                                            stroke-width="2"
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            class="size-5"
                                        >
                                            <path
                                                d="M2.992 16.342a2 2 0 0 1 .094 1.167l-1.065 3.29a1 1 0 0 0 1.236 1.168l3.413-.998a2 2 0 0 1 1.099.092 10 10 0 1 0-4.777-4.719"
                                            />
                                            <path d="M8 12h.01" />
                                            <path d="M12 12h.01" />
                                            <path d="M16 12h.01" />
                                        </svg>
                                        <p class="text-xs">
                                            Your page:
                                            https://example.com/new-campaign
                                            <br />
                                            is on fire
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="min-h-screen"></div>
    </div>
</template>

<style scoped></style>
