<template>
    <div id="app">
        <NavBar />
        <HeroSection />
        <PackagesSection />
        <MenuSection />
        <ContactForm />
        <FooterSection />
    </div>
</template>

<script setup>
import NavBar from './components/NavBar.vue';
import HeroSection from './components/HeroSection.vue';
import PackagesSection from './components/PackagesSection.vue';
import MenuSection from './components/MenuSection.vue';
import ContactForm from './components/ContactForm.vue';
import FooterSection from './components/FooterSection.vue';
</script>
