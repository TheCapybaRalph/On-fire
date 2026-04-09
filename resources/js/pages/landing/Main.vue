<script setup lang="ts">
import Header from '@/components/layouts/Header.vue';
import MainLandingPage from '@/components/content/landing/MainLandingPage.vue';
import FeatureShowoff from '@/components/content/landing/FeatureShowoff.vue';
import StatSwiper from '@/components/content/landing/StatSwiper.vue';
</script>

<template>
    <div class="bg-lp-background">
        <div class="bg-radial from-sky-900 to-lp-background to-70%">
            <div class="pt-3">
                <Header />
            </div>

            <MainLandingPage></MainLandingPage>
        </div>
        <FeatureShowoff/>
        <StatSwiper/>
        <div class="min-h-screen">
            <img src="/images/aws.webp" alt="Wo">
        </div>
    </div>
</template>

<style scoped></style>
