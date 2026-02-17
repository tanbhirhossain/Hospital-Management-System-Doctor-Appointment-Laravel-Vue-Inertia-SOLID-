<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import FrontendLayout from '@/layouts/FrontendLayout.vue'

defineOptions({ layout: FrontendLayout })

// ── Hero Slider ──────────────────────────────────────────────
const currentSlide = ref(0)
let autoSlideInterval = null

const slides = [
    {
        gradient: 'from-blue-800/95 via-blue-800/85',
        img: 'https://amzhospitalbd.com/storage/sliders/October2025/JV0EOX5DYsGudxtRkGQC.webp?w=1920&h=1080&fit=crop',
        alt: 'Modern Hospital',
        title: 'Welcome to AMZ Hospital',
        desc: 'Providing comprehensive healthcare services with state-of-the-art facilities and experienced medical professionals',
        ctas: [
            { href: '#appointment', label: 'Book Appointment', icon: 'fa-calendar-check', style: 'white', color: 'text-blue-800' },
            { href: 'tel:10699', label: 'Emergency: 10699', icon: 'fa-phone-alt', style: 'border' },
        ],
    },
    {
        gradient: 'from-sky-500/95 via-sky-500/85',
        img: 'https://amzhospitalbd.com/storage/sliders/October2025/qyR9OfpMxwGnJIl955ki.webp?w=1920&h=1080&fit=crop',
        alt: 'Expert Doctors',
        title: 'Expert Medical Professionals',
        desc: 'Our team of highly qualified doctors and specialists are dedicated to providing the best healthcare',
        ctas: [
            { href: '#doctors', label: 'Meet Our Doctors', icon: 'fa-user-md', style: 'white', color: 'text-sky-500' },
        ],
    },
    {
        gradient: 'from-emerald-500/95 via-emerald-500/85',
        img: 'https://images.unsplash.com/photo-1538108149393-fbbd81895907?w=1920&h=1080&fit=crop',
        alt: 'Modern Facilities',
        title: 'Advanced Medical Technology',
        desc: 'Equipped with cutting-edge technology and modern facilities for accurate diagnosis and treatment',
        ctas: [
            { href: '#services', label: 'Our Services', icon: 'fa-hospital', style: 'white', color: 'text-emerald-500' },
        ],
    },
]

const showSlide = (index) => { currentSlide.value = index }
const nextSlide = () => { currentSlide.value = (currentSlide.value + 1) % slides.length }
const prevSlide = () => { currentSlide.value = (currentSlide.value - 1 + slides.length) % slides.length }

const startAuto = () => { autoSlideInterval = setInterval(nextSlide, 5000) }
const stopAuto = () => clearInterval(autoSlideInterval)

// ── Quick Info Cards ─────────────────────────────────────────
const quickCards = [
    { gradient: 'from-blue-800/85 to-sky-500/75', icon: 'fa-user-md', title: 'Find Doctor', desc: 'Search specialists by department and expertise.', link: '#doctors', btnLabel: 'Explore', btnColor: 'text-blue-800' },
    { gradient: 'from-sky-500/85 to-cyan-400/70', icon: 'fa-calendar-check', title: 'Book an Appointment', desc: 'Schedule your visit with our doctors quickly.', link: '#appointment', btnLabel: 'Book Now', btnColor: 'text-sky-500' },
    { gradient: 'from-emerald-500/85 to-emerald-400/70', icon: 'fa-home', title: 'Home Sample Collection', desc: 'Book at-home diagnostic sample pickup service.', link: '#services', btnLabel: 'Request', btnColor: 'text-emerald-500' },
    { gradient: 'from-amber-500/85 to-amber-300/70', icon: 'fa-file-medical', title: 'Online Lab Report', desc: 'Access and download your lab reports online.', link: '#contact', btnLabel: 'View Report', btnColor: 'text-amber-500' },
    { gradient: 'from-red-500/85 to-rose-400/70', icon: 'fa-map-marker-alt', title: 'Find Us', desc: 'Get directions and contact details instantly.', link: '#contact', btnLabel: 'Location', btnColor: 'text-red-500' },
]

// ── Departments ───────────────────────────────────────────────
    // { color: 'from-blue-500 to-blue-600', textColor: 'text-blue-100', bg: 'bg-blue-50', icon: 'fa-heartbeat', name: 'Cardiology', subtitle: 'Heart & Cardiovascular Care', desc: 'Comprehensive cardiac care with advanced diagnostic facilities, interventional cardiology, and cardiac surgery.', specialists: '12+', beds: '45', services: ['ECG & Echocardiography', 'Angioplasty & Stenting', 'Cardiac Surgery'], available247: true },

const departments = [
    { 
        color: 'from-blue-600 to-indigo-700', 
        textColor: 'text-blue-100', 
        bg: 'bg-blue-50', 
        icon: 'fa-heartbeat', 
        name: 'Cardiology', 
        subtitle: 'Every heartbeat matters — we protect it.', 
        desc: 'The Cardiology Department at AMZ Hospital Ltd. provides comprehensive heart care—from prevention and diagnosis to advanced treatment.', 
        specialists: '12+', 
        beds: '45',
        available247: true 
    },
    { 
        color: 'from-emerald-500 to-teal-600', 
        textColor: 'text-emerald-100', 
        bg: 'bg-emerald-50', 
        icon: 'fa-user-md', 
        name: 'Medicine', 
        subtitle: 'Right diagnosis begins with the right doctor.', 
        desc: 'Providing patient-centered care for a wide range of acute and chronic medical conditions with a focus on internal wellness.', 
        specialists: '4+', 
        beds: '20' 
    },
    { 
        color: 'from-purple-500 to-fuchsia-600', 
        textColor: 'text-purple-100', 
        bg: 'bg-purple-50', 
        icon: 'fa-female', 
        name: 'Gynecology', 
        subtitle: 'Your partner in health and motherhood.', 
        desc: 'Dedicated to delivering comprehensive, compassionate, and evidence-based care for women at every stage of life.', 
        specialists: '9+', 
        beds: '30' 
    },
    { 
        color: 'from-red-500 to-orange-600', 
        textColor: 'text-red-100', 
        bg: 'bg-red-50', 
        icon: 'fa-microscope', 
        name: 'Hepatobiliary', 
        subtitle: 'Healthy digestion for a healthier life.', 
        desc: 'Advanced surgical care for complex diseases of the liver, gallbladder, and pancreas using the latest surgical technology.', 
        specialists: '8+', 
        beds: '15' 
    },
    { 
        color: 'from-amber-500 to-yellow-600', 
        textColor: 'text-amber-100', 
        bg: 'bg-amber-50', 
        icon: 'fa-baby', 
        name: 'Pediatrics', 
        subtitle: 'Caring for today, building tomorrow.', 
        desc: 'Dedicated to the health and well-being of infants, children, and adolescents with a gentle, child-friendly approach.', 
        specialists: '6+', 
        beds: '25' 
    },
    { 
        color: 'from-indigo-500 to-blue-700', 
        textColor: 'text-indigo-100', 
        bg: 'bg-indigo-50', 
        icon: 'fa-procedures', 
        name: 'Surgery', 
        subtitle: 'Precision surgery with minimal scars.', 
        desc: 'Specializing in Laparoscopic and Laser solutions for a wide range of conditions to ensure faster recovery times.', 
        specialists: '7+', 
        beds: '40' 
    }
]

// ── Doctors ────────────────────────────────────────────────────
const doctors = [
    { color: 'from-blue-400 to-blue-600', name: 'Dr. Ahmed Rahman', specialty: 'Cardiologist', degree: 'MBBS, MD (Cardiology)', exp: '15+' },
    { color: 'from-emerald-400 to-emerald-600', name: 'Dr. Fatima Khan', specialty: 'Neurologist', degree: 'MBBS, MD (Neurology)', exp: '12+' },
    { color: 'from-purple-400 to-purple-600', name: 'Dr. Kamal Hossain', specialty: 'Orthopedic Surgeon', degree: 'MBBS, MS (Orthopedics)', exp: '18+' },
    { color: 'from-pink-400 to-pink-600', name: 'Dr. Sultana Begum', specialty: 'Gynecologist', degree: 'MBBS, FCPS (Gynecology)', exp: '10+' },
]

// ── Gallery ────────────────────────────────────────────────────
const activeFilter = ref('all')
const galleryItems = [
    { category: 'infrastructure', img: 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&h=600&fit=crop', badge: 'Infrastructure', badgeColor: 'bg-blue-800', title: 'Main Hospital Building', desc: 'Modern 10-story facility' },
    { category: 'facilities', img: 'https://images.unsplash.com/photo-1631217868264-e5b90bb7e133?w=800&h=600&fit=crop', badge: 'Facilities', badgeColor: 'bg-red-500', title: '24/7 Emergency Room', desc: 'Advanced trauma care' },
    { category: 'equipment', img: 'https://images.unsplash.com/photo-1579684385127-1ef15d508118?w=800&h=600&fit=crop', badge: 'Equipment', badgeColor: 'bg-emerald-500', title: 'Modern Operating Theater', desc: 'State-of-the-art surgical suite' },
    { category: 'facilities', img: 'https://images.unsplash.com/photo-1512678080530-7760d81faba6?w=800&h=600&fit=crop', badge: 'Facilities', badgeColor: 'bg-purple-600', title: 'Intensive Care Unit (ICU)', desc: 'Critical care monitoring' },
    { category: 'departments', img: 'https://images.unsplash.com/photo-1519494026892-80bbd2d6fd0d?w=800&h=600&fit=crop', badge: 'Departments', badgeColor: 'bg-cyan-600', title: 'Private Patient Room', desc: 'Comfortable accommodation' },
    { category: 'equipment', img: 'https://images.unsplash.com/photo-1581594693702-fbdc51b2763b?w=800&h=600&fit=crop', badge: 'Equipment', badgeColor: 'bg-orange-600', title: 'Diagnostic Laboratory', desc: 'Advanced testing facilities' },
]

const filters = ['all', 'infrastructure', 'facilities', 'equipment', 'departments']
const filteredGallery = () => activeFilter.value === 'all' ? galleryItems : galleryItems.filter(i => i.category === activeFilter.value)

// ── Services ───────────────────────────────────────────────────
const servicesList = [
    { bg: 'from-blue-50', icon: 'fa-ambulance', title: '24/7 Emergency Services', desc: 'Round-the-clock emergency medical care with rapid response team', items: ['Trauma Care', 'Intensive Care Unit', 'Emergency Surgery'] },
    { bg: 'from-green-50', icon: 'fa-x-ray', title: 'Diagnostic Services', desc: 'Advanced diagnostic facilities with latest technology', items: ['CT Scan & MRI', 'Ultrasound', 'Laboratory Tests'] },
    { bg: 'from-purple-50', icon: 'fa-procedures', title: 'Surgical Services', desc: 'Expert surgical care with modern operation theaters', items: ['General Surgery', 'Laparoscopic Surgery', 'Specialized Surgery'] },
    { bg: 'from-red-50', icon: 'fa-heartbeat', title: 'Cardiac Care', desc: 'Comprehensive heart care and treatment services', items: ['ECG & Echo', 'Cardiac Catheterization', 'Heart Surgery'] },
    { bg: 'from-yellow-50', icon: 'fa-baby', title: 'Maternity Services', desc: 'Complete care for mothers and newborns', items: ['Prenatal Care', 'Delivery Services', 'NICU'] },
    { bg: 'from-pink-50', icon: 'fa-pills', title: 'Pharmacy Services', desc: '24/7 pharmacy with all essential medicines', items: ['Prescription Medicines', 'OTC Medications', 'Home Delivery'] },
]

// ── Health Packages ────────────────────────────────────────────
const packages = [
    { bg: 'bg-blue-100', color: 'text-blue-800', icon: 'fa-user-check', title: 'Basic Checkup', desc: 'General physician consultation, CBC, blood sugar, urine R/E, and ECG.', price: 'BDT 2,500' },
    { bg: 'bg-pink-100', color: 'text-pink-700', icon: 'fa-heartbeat', title: 'Women Wellness', desc: 'Gyne consultation, thyroid profile, vitamin D, breast exam, and pelvic USG.', price: 'BDT 4,800' },
    { bg: 'bg-emerald-100', color: 'text-emerald-700', icon: 'fa-user-shield', title: 'Senior Care', desc: 'Cardiac risk panel, chest X-ray, kidney profile, diabetic panel, and specialist review.', price: 'BDT 6,200' },
    { bg: 'bg-amber-100', color: 'text-amber-700', icon: 'fa-users', title: 'Family Package', desc: 'Combined health screening for 2 adults including consultation and core labs.', price: 'BDT 8,900' },
]

// ── Centre of Excellence ───────────────────────────────────────
const centers = [
    { id: 'coe-fertility-research-center', bg: 'bg-blue-100', color: 'text-blue-800', icon: 'fa-flask', title: 'Fertility & Research Center', desc: 'Personalized fertility assessment, treatment planning, and research-driven care pathways.' },
    { id: 'coe-hypospadias-center', bg: 'bg-emerald-100', color: 'text-emerald-700', icon: 'fa-user-shield', title: 'Hypospadias center', desc: 'Child-focused surgical correction with coordinated follow-up and family support.' },
    { id: 'coe-laser-proctology-surgery-center', bg: 'bg-rose-100', color: 'text-rose-700', icon: 'fa-bolt', title: 'Laser & Proctology Surgery Center', desc: 'Modern laser-based proctology procedures with reduced pain and faster recovery.' },
    { id: 'coe-plastic-aesthetic-laser-surgery-center', bg: 'bg-violet-100', color: 'text-violet-700', icon: 'fa-magic', title: 'Plastic, Aesthetic & Laser Surgery Center', desc: 'Reconstructive, cosmetic, and laser procedures tailored to patient goals.' },
    { id: 'coe-primary-care-center', bg: 'bg-cyan-100', color: 'text-cyan-700', icon: 'fa-stethoscope', title: 'Primary Care Center', desc: 'Preventive, chronic, and family medicine services in one coordinated center.' },
    { id: 'coe-stroke-neuro-rehabilitation-center', bg: 'bg-orange-100', color: 'text-orange-700', icon: 'fa-brain', title: 'Stroke & Neuro Rehabilitation Center', desc: 'Neuro recovery with physiotherapy, speech therapy, and multidisciplinary monitoring.' },
    { id: 'coe-cancer-care-center', bg: 'bg-pink-100', color: 'text-pink-700', icon: 'fa-ribbon', title: 'Cancer Care Center', desc: 'Integrated oncology support from diagnosis to treatment and survivorship care.' },
    { id: 'coe-hepatobiliary-pancreatic-surgery-center', bg: 'bg-lime-100', color: 'text-lime-700', icon: 'fa-procedures', title: 'Hepatobiliary & Pancreatic Surgery Center', desc: 'Advanced surgical management for complex liver, biliary, and pancreatic diseases.' },
]

// ── Testimonials ───────────────────────────────────────────────
const testimonials = [
    { initials: 'AH', bg: 'from-blue-800 to-sky-500', cardBg: 'from-blue-50', name: 'Abdul Hamid', short: 'Excellent hospital with caring staff and very professional doctors.', full: ' The facilities are modern, and the care quality was consistently high from admission to discharge. Highly recommended for trusted healthcare.' },
    { initials: 'RB', bg: 'from-emerald-500 to-emerald-600', cardBg: 'from-green-50', name: 'Rahima Begum', short: 'I received excellent care during my stay and felt supported.', full: ' The nursing team was attentive, and doctors explained each step clearly so my family and I stayed confident throughout treatment.' },
    { initials: 'MK', bg: 'from-purple-500 to-purple-600', cardBg: 'from-purple-50', name: 'Mahmud Khan', short: 'Top-notch medical facility with advanced equipment and fast service.', full: ' The emergency department handled my case quickly, and follow-up care was just as good. I am grateful for their professionalism.' },
    { initials: 'SN', bg: 'from-cyan-500 to-cyan-600', cardBg: 'from-cyan-50', name: 'Shila Nasrin', short: 'Clean environment and excellent diagnostics at AMZ Hospital.', full: ' My reports were delivered quickly, and consultation was clear and reassuring. The whole process felt organized and patient-friendly.' },
    { initials: 'TU', bg: 'from-amber-500 to-amber-600', cardBg: 'from-amber-50', name: 'Tanvir Uddin', short: 'Appointment process was smooth, and waiting time was reasonable.', full: ' Staff guided me politely, and the doctor gave practical advice with clear medicine instructions. Overall, a dependable experience.' },
    { initials: 'FP', bg: 'from-rose-500 to-rose-600', cardBg: 'from-rose-50', name: 'Farzana Parvin', short: 'Excellent maternal care and supportive nursing staff throughout.', full: ' The doctors checked in regularly, answered questions patiently, and ensured comfort before and after procedures.' },
]

const expandedTestimonials = ref({})
const toggleTestimonial = (i) => { expandedTestimonials.value[i] = !expandedTestimonials.value[i] }

// ── Stats Counter ──────────────────────────────────────────────
const stats = [
    { target: 10000, label: 'Patients Treated' },
    { target: 150, label: 'Expert Doctors' },
    { target: 25, label: 'Years Experience' },
    { target: 500, label: 'Hospital Beds' },
]
const statValues = ref(stats.map(() => 0))
let counterAnimated = false

// ── Partners ────────────────────────────────────────────────────
const partners = ['bata.com', 'bracbank.com', 'robi.com.bd', 'daraz.com.bd', 'citybank.com.bd', 'grameenphone.com', 'akij.net', 'squaregroup.com']
const doubledPartners = [...partners, ...partners]

// ── Appointment Form ────────────────────────────────────────────
const form = ref({ name: '', phone: '', email: '', department: '', date: '', time: '', message: '' })
const formSuccess = ref(false)

const submitForm = () => {
    formSuccess.value = true
    form.value = { name: '', phone: '', email: '', department: '', date: '', time: '', message: '' }
    setTimeout(() => { formSuccess.value = false }, 5000)
}

// ── Newsletter ─────────────────────────────────────────────────
const newsletterEmail = ref('')
const newsletterSuccess = ref(false)
const submitNewsletter = () => {
    if (!newsletterEmail.value) return
    newsletterSuccess.value = true
    newsletterEmail.value = ''
}

// ── Lifecycle ──────────────────────────────────────────────────
onMounted(() => {
    startAuto()

    // Scroll animations (IntersectionObserver)
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-in')
                observer.unobserve(entry.target)
            }
        })
    }, { threshold: 0.1 })

    document.querySelectorAll('.scroll-reveal').forEach(el => observer.observe(el))

    // Counter animation
    const counterObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting && !counterAnimated) {
                counterAnimated = true
                stats.forEach((stat, i) => {
                    let current = 0
                    const increment = stat.target / 120
                    const tick = () => {
                        current += increment
                        if (current < stat.target) {
                            statValues.value[i] = Math.ceil(current)
                            requestAnimationFrame(tick)
                        } else {
                            statValues.value[i] = stat.target
                        }
                    }
                    tick()
                })
            }
        })
    }, { threshold: 0.5 })

    const statsEl = document.getElementById('stats-section')
    if (statsEl) counterObserver.observe(statsEl)

    // Smooth scroll
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', (e) => {
            const href = anchor.getAttribute('href')
            if (href && href !== '#' && href.length > 1) {
                const target = document.querySelector(href)
                if (target) {
                    e.preventDefault()
                    window.scrollTo({ top: target.offsetTop - 80, behavior: 'smooth' })
                }
            }
        })
    })
})

onUnmounted(() => stopAuto())
</script>

<template>
    <!-- ── HERO SLIDER ───────────────────────────────────── -->
    <section id="home" role="region" aria-label="Hero section" class="relative">
        <div class="relative h-[500px] md:h-[600px] lg:h-[700px] overflow-hidden">
            <div v-for="(slide, i) in slides" :key="i"
                class="absolute inset-0 transition-opacity duration-1000"
                :class="i === currentSlide ? 'opacity-100 z-10' : 'opacity-0 z-0'">
                <div :class="`absolute inset-0 bg-gradient-to-r ${slide.gradient} to-transparent z-10`"></div>
                <img :src="slide.img" :alt="slide.alt" class="w-full h-full object-cover" loading="eager" />
                <div class="absolute inset-0 z-20 flex items-center">
                    <div class="container mx-auto px-4">
                        <div class="max-w-3xl text-white">
                            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 leading-tight">{{ slide.title }}</h2>
                            <p class="text-lg md:text-xl mb-8 text-gray-100">{{ slide.desc }}</p>
                            <div class="flex flex-col sm:flex-row gap-4">
                                <a v-for="cta in slide.ctas" :key="cta.href" :href="cta.href"
                                    :class="cta.style === 'white'
                                        ? `bg-white ${cta.color} px-8 py-4 rounded-lg font-semibold hover:shadow-xl transition-all transform hover:scale-105 text-center`
                                        : 'border-2 border-white text-white px-8 py-4 rounded-lg font-semibold hover:bg-white hover:text-blue-800 transition-all text-center'">
                                    <i :class="`fas ${cta.icon} mr-2`"></i>{{ cta.label }}
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Controls -->
            <button @click="() => { stopAuto(); prevSlide(); startAuto() }" aria-label="Previous slide"
                class="absolute left-4 top-1/2 -translate-y-1/2 z-30 bg-white/30 hover:bg-white/50 backdrop-blur-sm text-white p-3 rounded-full transition">
                <i class="fas fa-chevron-left text-xl"></i>
            </button>
            <button @click="() => { stopAuto(); nextSlide(); startAuto() }" aria-label="Next slide"
                class="absolute right-4 top-1/2 -translate-y-1/2 z-30 bg-white/30 hover:bg-white/50 backdrop-blur-sm text-white p-3 rounded-full transition">
                <i class="fas fa-chevron-right text-xl"></i>
            </button>

            <!-- Dots -->
            <div class="absolute bottom-6 left-1/2 -translate-x-1/2 z-30 flex space-x-2">
                <button v-for="(_, i) in slides" :key="i" @click="() => { stopAuto(); showSlide(i); startAuto() }"
                    :class="['w-3 h-3 rounded-full transition-all', i === currentSlide ? 'bg-white' : 'bg-white/50']" />
            </div>
        </div>
    </section>

    <!-- ── QUICK INFO CARDS ──────────────────────────────── -->
    <section class="py-0 relative -mt-16 z-40">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-6">
                <div v-for="card in quickCards" :key="card.title"
                    :class="`bg-gradient-to-br ${card.gradient} text-white rounded-xl p-6 shadow-2xl border border-white/30 backdrop-blur-lg transition-all transform hover:-translate-y-2`">
                    <div class="w-14 h-14 bg-white/20 rounded-full flex items-center justify-center mb-4">
                        <i :class="`fas ${card.icon} text-2xl`"></i>
                    </div>
                    <h3 class="text-xl font-bold mb-2">{{ card.title }}</h3>
                    <p class="mb-4 text-sm text-white/90">{{ card.desc }}</p>
                    <a :href="card.link"
                        :class="`inline-flex items-center bg-white ${card.btnColor} px-4 py-2 rounded-lg font-semibold text-sm hover:shadow-lg transition`">
                        {{ card.btnLabel }}
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ── ABOUT ─────────────────────────────────────────── -->
    <section id="about" role="region" aria-label="About us" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div class="relative">
                    <img src="https://amzhospitalbd.com/storage/AMZ.jpg?w=800&h=600&fit=crop"
                        alt="AMZ Hospital Building" class="rounded-2xl shadow-2xl w-full" loading="lazy" />
                    <div class="absolute -bottom-6 -right-6 bg-blue-800 text-white p-8 rounded-2xl shadow-xl">
                        <div class="text-5xl font-bold">7+</div>
                        <div class="text-sm">Years of Excellence</div>
                    </div>
                </div>
                <div>
                    <div class="inline-block bg-blue-50 text-blue-800 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                        <i class="fas fa-hospital mr-2"></i>About AMZ Hospital
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">Welcome to AMZ Hospital Bangladesh</h2>
                    <p class="text-lg text-gray-600 mb-6 leading-relaxed">
                        Since 2018, AMZ Hospital Ltd., measured its success by counting of lives been saved, hopes been restored, and care been delivered with quality service & professionalism. 
                    </p>
                    <p class="text-gray-600 mb-8 leading-relaxed">
                        It was founded by a team of visionary clinicians, leaders from civil society and different discipline with a shared vision of reducing health care inequalities.
                    </p>
                    <div class="grid sm:grid-cols-2 gap-4 mb-8">
                        <div v-for="feat in ['24/7 Emergency Care', 'Expert Specialists', 'Modern Equipment', 'Patient-Centered Care']" :key="feat"
                            class="flex items-start space-x-3">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-check text-blue-800 text-xl"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-gray-900">{{ feat }}</h4>
                                <p class="text-sm text-gray-600">Quality care you can trust</p>
                            </div>
                        </div>
                    </div>
                    <a href="#appointment"
                        class="inline-flex items-center bg-gradient-to-r from-blue-800 to-sky-500 text-white px-8 py-4 rounded-lg font-semibold hover:shadow-xl transition-all transform hover:scale-105">
                        <i class="fas fa-book-open mr-2"></i> Read More
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- ── WHY CHOOSE US ────────────────────────────────── -->
    <section class="py-20 bg-gradient-to-br from-blue-50 to-indigo-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <div class="inline-block bg-white text-blue-800 px-4 py-2 rounded-full text-sm font-semibold mb-4 shadow-sm">
                    <i class="fas fa-award mr-2"></i>Why Choose Us
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Why AMZ Hospital is Your Best Choice</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">We are committed to providing exceptional healthcare with advanced facilities and experienced professionals</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div v-for="(feat, i) in [
                    { color: 'from-blue-500 to-blue-600', icon: 'fa-user-md', title: 'Qualified Doctors', desc: 'Our medical team consists of highly qualified and experienced doctors from renowned institutions' },
                    { color: 'from-emerald-500 to-emerald-600', icon: 'fa-hospital-alt', title: 'Modern Facilities', desc: 'State-of-the-art infrastructure with the latest medical equipment and technology' },
                    { color: 'from-red-500 to-red-600', icon: 'fa-ambulance', title: 'Emergency Care', desc: '24/7 emergency services with rapid response team and advanced life support' },
                    { color: 'from-purple-500 to-purple-600', icon: 'fa-hand-holding-medical', title: 'Patient Care', desc: 'Compassionate care with personalized treatment plans for every patient' },
                    { color: 'from-yellow-500 to-yellow-600', icon: 'fa-microscope', title: 'Advanced Diagnostics', desc: 'Comprehensive diagnostic services with cutting-edge laboratory facilities' },
                    { color: 'from-pink-500 to-pink-600', icon: 'fa-heartbeat', title: 'Specialized Care', desc: 'Multiple specialty departments for comprehensive healthcare services' },
                    { color: 'from-indigo-500 to-indigo-600', icon: 'fa-shield-alt', title: 'Safety Standards', desc: 'Strict adherence to international safety and hygiene protocols' },
                    { color: 'from-teal-500 to-teal-600', icon: 'fa-dollar-sign', title: 'Affordable Pricing', desc: 'Quality healthcare at competitive prices with flexible payment options' },
                ]" :key="feat.title"
                    class="bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all transform hover:-translate-y-2">
                    <div :class="`w-16 h-16 bg-gradient-to-br ${feat.color} rounded-xl flex items-center justify-center mb-6`"
                        style="animation: float 3s ease-in-out infinite" :style="`animation-delay: ${i * 0.2}s`">
                        <i :class="`fas ${feat.icon} text-white text-3xl`"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">{{ feat.title }}</h3>
                    <p class="text-gray-600">{{ feat.desc }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ── DEPARTMENTS ──────────────────────────────────── -->
<section id="departments" class="py-24 bg-slate-50 relative overflow-hidden">
    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-blue-200 to-transparent"></div>
    
    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center mb-16 scroll-reveal">
            <span class="text-blue-600 font-bold uppercase tracking-[0.2em] text-xs mb-3 block">Medical Excellence</span>
            <h2 class="text-4xl md:text-5xl font-black text-slate-900 mb-6 tracking-tight">Specialized Departments</h2>
            <div class="w-20 h-1.5 bg-blue-600 mx-auto rounded-full"></div>
            <p class="mt-6 text-slate-500 max-w-2xl mx-auto text-lg leading-relaxed">
                World-class medical expertise paired with state-of-the-art technology to provide the highest standard of care.
            </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-10">
            <div v-for="dept in departments" :key="dept.name"
                class="group flex flex-col h-full bg-white rounded-[2rem] overflow-hidden shadow-sm hover:shadow-2xl hover:shadow-blue-200/50 transition-all duration-500 border border-slate-100 relative scroll-reveal">
                
                <div :class="`bg-gradient-to-br ${dept.color} p-10 relative overflow-hidden` ">
                    <div class="absolute -right-6 -top-6 w-32 h-32 bg-white/10 rounded-full blur-3xl group-hover:bg-white/20 transition-colors"></div>
                    
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-md rounded-2xl flex items-center justify-center mb-8 shadow-inner border border-white/20 group-hover:rotate-6 transition-transform duration-500">
                        <i :class="`fas ${dept.icon} text-white text-3xl transition-transform duration-500 group-hover:scale-110` "></i>
                    </div>
                    
                    <h3 class="text-2xl font-bold text-white mb-2 tracking-tight">{{ dept.name }}</h3>
                    <p :class="`${dept.textColor} text-sm font-medium leading-snug line-clamp-1 opacity-80 uppercase tracking-wide` ">
                        {{ dept.subtitle }}
                    </p>
                </div>

                <div class="p-10 flex flex-col flex-grow">
                    <p class="text-slate-500 mb-10 line-clamp-3 text-base leading-relaxed min-h-[4.5rem]">
                        {{ dept.desc }}
                    </p>

                    <div class="mt-auto flex flex-col gap-8">
                        <div class="flex items-center justify-between border-b border-slate-50 pb-6">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center">
                                    <i class="fas fa-user-doctor text-blue-600 text-sm"></i>
                                </div>
                                <div>
                                    <p class="text-[10px] uppercase font-bold text-slate-400 tracking-wider">Expert Team</p>
                                    <p class="text-sm font-bold text-slate-800">{{ dept.specialists }} Specialists</p>
                                </div>
                            </div>
                            <div class="flex items-center text-[10px] font-bold text-emerald-600 uppercase tracking-widest bg-emerald-50 px-3 py-1 rounded-full">
                                <span class="w-1.5 h-1.5 bg-emerald-500 rounded-full mr-2 animate-pulse"></span>
                                Active
                            </div>
                        </div>

                        <a href="#appointment"
                            class="group/btn relative flex items-center justify-between w-full px-7 py-4 rounded-2xl border-2 border-slate-900 text-slate-900 font-bold transition-all duration-300 hover:bg-slate-900 hover:text-white overflow-hidden active:scale-95">
                            <span class="relative z-10 uppercase tracking-widest text-xs">Read More</span>
                            <div class="relative z-10 flex items-center justify-center w-8 h-8 rounded-full bg-slate-100 text-slate-900 transition-all duration-300 group-hover/btn:bg-white/20 group-hover/btn:text-white">
                                <i class="fas fa-arrow-right text-[10px] transition-transform duration-300 group-hover/btn:translate-x-1"></i>
                            </div>
                        </a>
                    </div>
                </div>

                <div v-if="dept.available247"
                    class="absolute top-6 right-6 bg-white/10 backdrop-blur-md px-4 py-1.5 rounded-full text-[10px] text-white font-bold border border-white/20 uppercase tracking-widest">
                    Emergency 24/7
                </div>
            </div>
        </div>
        
        <div class="mt-20 text-center">
            <a href="#departments" class="inline-flex items-center group text-blue-800 font-bold tracking-widest uppercase text-sm">
                View All Medical Units 
                <span class="ml-4 w-12 h-px bg-blue-800 transition-all group-hover:w-20"></span>
            </a>
        </div>
    </div>
</section>

    <!-- ── DOCTORS ───────────────────────────────────────── -->
    <section id="doctors" role="region" aria-label="Our doctors" class="py-20 bg-gradient-to-br from-gray-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Meet Our Expert Doctors</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Highly qualified and experienced medical professionals dedicated to your health</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-8">
                <div v-for="doc in doctors" :key="doc.name"
                    class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all transform hover:-translate-y-2">
                    <div :class="`h-64 bg-gradient-to-br ${doc.color} flex items-center justify-center`">
                        <i class="fas fa-user-md text-white text-8xl"></i>
                    </div>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-900 mb-1">{{ doc.name }}</h3>
                        <p class="text-sm text-blue-800 font-semibold mb-3">{{ doc.specialty }}</p>
                        <p class="text-sm text-gray-600 mb-4">{{ doc.degree }}<br />{{ doc.exp }} Years Experience</p>
                        <a href="#appointment"
                            class="block w-full bg-blue-800 text-white text-center py-2.5 rounded-lg font-semibold hover:bg-sky-500 transition-colors">
                            Book Appointment
                        </a>
                    </div>
                </div>
            </div>
            <div class="text-center mt-12">
                <a href="#doctors"
                    class="inline-flex items-center bg-white text-blue-800 px-8 py-4 rounded-lg font-semibold shadow-lg hover:shadow-xl transition-all transform hover:scale-105">
                    <i class="fas fa-users mr-2"></i>View All Doctors
                </a>
            </div>
        </div>
    </section>

    <!-- ── GALLERY ───────────────────────────────────────── -->
    <section id="gallery" role="region" aria-label="Hospital gallery" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Hospital Gallery</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Explore our state-of-the-art facilities, modern infrastructure, and patient-centered environment</p>
            </div>
            <!-- Filter Tabs -->
            <div class="flex flex-wrap justify-center gap-3 mb-12">
                <button v-for="f in filters" :key="f" @click="activeFilter = f"
                    :class="['px-6 py-3 rounded-lg font-semibold transition capitalize', activeFilter === f ? 'bg-blue-800 text-white' : 'bg-white text-slate-800 border border-slate-200 hover:bg-sky-500 hover:text-white hover:border-sky-500']">
                    {{ f === 'all' ? 'All Photos' : f }}
                </button>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                <div v-for="item in filteredGallery()" :key="item.title"
                    class="group cursor-pointer">
                    <div class="relative overflow-hidden rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300">
                        <img :src="item.img" :alt="item.title"
                            class="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy" />
                        <div class="absolute inset-0 bg-gradient-to-t from-gray-900/90 via-gray-900/40 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                            <div class="absolute bottom-0 left-0 right-0 p-6 text-white">
                                <h3 class="text-xl font-bold mb-2">{{ item.title }}</h3>
                                <p class="text-sm text-gray-200">{{ item.desc }}</p>
                            </div>
                        </div>
                        <div :class="`absolute top-4 left-4 ${item.badgeColor} px-3 py-1 rounded-full text-white text-xs font-semibold`">
                            {{ item.badge }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── SERVICES ──────────────────────────────────────── -->
    <section id="services" role="region" aria-label="Healthcare services" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Comprehensive Healthcare Services</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Complete medical care with advanced facilities and expert professionals</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div v-for="svc in servicesList" :key="svc.title"
                    :class="`bg-gradient-to-br ${svc.bg} to-white border-2 border-gray-100 rounded-2xl p-8 hover:border-blue-800 hover:shadow-xl transition`">
                    <i :class="`fas ${svc.icon} text-5xl text-blue-800 mb-4`"></i>
                    <h3 class="text-2xl font-bold text-gray-900 mb-3">{{ svc.title }}</h3>
                    <p class="text-gray-600 mb-4">{{ svc.desc }}</p>
                    <ul class="space-y-2 text-sm text-gray-600">
                        <li v-for="item in svc.items" :key="item" class="flex items-center">
                            <i class="fas fa-check-circle text-emerald-500 mr-2"></i>{{ item }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- ── HEALTH PACKAGES ───────────────────────────────── -->
    <section id="health-packages" role="region" aria-label="Health packages" class="py-20 bg-gradient-to-b from-slate-50 to-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-14">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Health Packages</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Affordable preventive checkup plans designed for individuals, women, seniors, and families.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <article v-for="pkg in packages" :key="pkg.title"
                    class="bg-white rounded-2xl p-6 border border-slate-200 shadow-md hover:shadow-xl transition">
                    <div :class="`w-12 h-12 rounded-lg ${pkg.bg} ${pkg.color} flex items-center justify-center mb-4`">
                        <i :class="`fas ${pkg.icon}`"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-2">{{ pkg.title }}</h3>
                    <p class="text-sm text-gray-600 mb-4">{{ pkg.desc }}</p>
                    <p class="text-2xl font-bold text-blue-800 mb-4">{{ pkg.price }}</p>
                    <a href="#appointment"
                        class="block text-center bg-blue-800 text-white py-2.5 rounded-lg font-semibold hover:bg-sky-500 transition-colors">Book Package</a>
                </article>
            </div>
        </div>
    </section>

    <!-- ── CENTRE OF EXCELLENCE ─────────────────────────── -->
    <section id="center-of-excellence" role="region" aria-label="Center Of Excellence" class="py-20 bg-gradient-to-br from-slate-50 to-blue-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-14">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Center Of Excellence</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Advanced multidisciplinary centers delivering focused, high-quality care.</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                <article v-for="center in centers" :key="center.id" :id="center.id"
                    class="bg-white rounded-2xl p-6 border border-slate-100 shadow-md hover:shadow-xl transition-all">
                    <div :class="`w-12 h-12 rounded-lg ${center.bg} ${center.color} flex items-center justify-center mb-4`">
                        <i :class="`fas ${center.icon}`"></i>
                    </div>
                    <h3 class="font-bold text-gray-900">{{ center.title }}</h3>
                    <p class="text-sm text-gray-600 mt-2">{{ center.desc }}</p>
                </article>
            </div>
            <div class="text-center mt-10">
                <a href="#center-of-excellence"
                    class="inline-flex items-center bg-gradient-to-r from-blue-800 to-sky-500 text-white px-8 py-3 rounded-lg font-semibold hover:shadow-xl transition-all">
                    View All Center Of Excellence <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- ── APPOINTMENT ───────────────────────────────────── -->
    <section id="appointment" role="region" aria-label="Book appointment"
        class="py-20 bg-gradient-to-br from-blue-800 to-sky-500 text-white relative overflow-hidden">
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-0 left-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
            <div class="absolute bottom-0 right-0 w-96 h-96 bg-white rounded-full blur-3xl"></div>
        </div>
        <div class="container mx-auto px-4 relative z-10">
            <div class="grid lg:grid-cols-2 gap-12 items-center">
                <div>
                    <div class="inline-block bg-white/20 px-4 py-2 rounded-full text-sm font-semibold mb-4">
                        <i class="fas fa-calendar-check mr-2"></i>Book Your Appointment
                    </div>
                    <h2 class="text-4xl md:text-5xl font-bold mb-6">Schedule Your Visit Today</h2>
                    <p class="text-xl mb-8 text-white/90">Get expert medical care at your convenience. Book an appointment with our specialists.</p>
                    <div class="space-y-4">
                        <div v-for="feat in [
                            { icon: 'fa-clock', title: 'Quick & Easy', desc: 'Book in just a few steps' },
                            { icon: 'fa-user-md', title: 'Choose Your Doctor', desc: 'Select from our expert specialists' },
                            { icon: 'fa-calendar-alt', title: 'Flexible Scheduling', desc: 'Pick your preferred time slot' },
                        ]" :key="feat.title" class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-white/20 rounded-lg flex items-center justify-center">
                                <i :class="`fas ${feat.icon} text-2xl`"></i>
                            </div>
                            <div>
                                <h4 class="font-semibold text-lg">{{ feat.title }}</h4>
                                <p class="text-white/80">{{ feat.desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form -->
                <div class="bg-white rounded-2xl p-8 shadow-2xl">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6">Book Appointment</h3>
                    <div v-if="formSuccess" class="mb-4 text-green-600 font-semibold text-center bg-green-50 py-3 rounded-lg">
                        ✅ Thank you! Your appointment has been requested. We will contact you soon.
                    </div>
                    <form @submit.prevent="submitForm" class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                            <input v-model="form.name" type="text" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-800 focus:border-transparent transition"
                                placeholder="Enter your name" />
                        </div>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                                <input v-model="form.phone" type="tel" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-800 focus:border-transparent transition"
                                    placeholder="01XXXXXXXXX" />
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Email</label>
                                <input v-model="form.email" type="email"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-800 focus:border-transparent transition"
                                    placeholder="your@email.com" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Select Department *</label>
                            <select v-model="form.department" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-800 focus:border-transparent transition">
                                <option value="">Choose Department</option>
                                <option v-for="dept in ['Cardiology','Neurology','Orthopedics','Pediatrics','Gynecology','Ophthalmology','Pulmonology','General Medicine']" :key="dept">{{ dept }}</option>
                            </select>
                        </div>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Preferred Date *</label>
                                <input v-model="form.date" type="date" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-800 focus:border-transparent transition" />
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Preferred Time *</label>
                                <input v-model="form.time" type="time" required
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-800 focus:border-transparent transition" />
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-gray-700 mb-2">Message (Optional)</label>
                            <textarea v-model="form.message" rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-800 focus:border-transparent transition"
                                placeholder="Any specific requirements..."></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-gradient-to-r from-blue-800 to-sky-500 text-white py-4 rounded-lg font-bold text-lg hover:shadow-xl transition-all transform hover:scale-105">
                            <i class="fas fa-calendar-check mr-2"></i>Confirm Appointment
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- ── TESTIMONIALS ──────────────────────────────────── -->
    <section id="testimonials" role="region" aria-label="Patient testimonials" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">What Our Patients Say</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Real experiences from patients who trusted us with their healthcare</p>
            </div>
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <article v-for="(t, i) in testimonials" :key="t.name"
                    :class="`bg-gradient-to-br ${t.cardBg} to-white rounded-2xl p-8 shadow-lg hover:shadow-xl transition`">
                    <div class="flex items-center mb-6">
                        <div :class="`w-16 h-16 bg-gradient-to-br ${t.bg} rounded-full flex items-center justify-center text-white text-2xl font-bold mr-4`">
                            {{ t.initials }}
                        </div>
                        <div>
                            <h4 class="font-bold text-gray-900">{{ t.name }}</h4>
                            <div class="flex text-yellow-400 text-sm">
                                <i v-for="s in 5" :key="s" class="fas fa-star"></i>
                            </div>
                        </div>
                    </div>
                    <p class="text-gray-600 italic">
                        {{ t.short }}
                        <span v-if="expandedTestimonials[i]">{{ t.full }}</span>
                    </p>
                    <button @click="toggleTestimonial(i)" class="mt-4 text-sm font-semibold text-blue-800 hover:text-sky-500">
                        {{ expandedTestimonials[i] ? 'Show less' : 'Read more' }}
                    </button>
                </article>
            </div>
        </div>
    </section>

    <!-- ── STATISTICS ────────────────────────────────────── -->
    <section id="stats-section" class="py-20 bg-gradient-to-r from-blue-800 to-sky-500 text-white">
        <div class="container mx-auto px-4">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
                <div v-for="(stat, i) in stats" :key="stat.label">
                    <div class="text-5xl font-bold mb-2" style="font-feature-settings: 'tnum'; font-variant-numeric: tabular-nums;">
                        {{ statValues[i].toLocaleString() }}{{ statValues[i] >= stat.target ? '+' : '' }}
                    </div>
                    <p class="text-lg text-white/90">{{ stat.label }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- ── NEWSLETTER + PARTNERS ─────────────────────────── -->
    <section id="newsletter-partners" class="py-20 bg-gradient-to-b from-white to-slate-50">
        <div class="container mx-auto px-4">
            <div class="max-w-5xl mx-auto mb-14">
                <div class="relative rounded-3xl p-[1px] shadow-2xl"
                    style="background: linear-gradient(to right, #1e40af, #0ea5e9, #10b981);">
                    <div class="rounded-3xl bg-white p-6 md:p-8">
                        <div class="grid lg:grid-cols-2 gap-6 items-stretch">
                            <div class="rounded-2xl bg-gradient-to-br from-blue-800 to-sky-500 text-white p-6 md:p-8">
                                <div class="w-12 h-12 rounded-xl bg-white/20 flex items-center justify-center mb-4">
                                    <i class="fas fa-envelope-open-text text-xl"></i>
                                </div>
                                <p class="text-white/80 text-xs font-semibold uppercase tracking-[0.2em] mb-2">Health Updates</p>
                                <h2 class="text-3xl md:text-4xl font-bold mb-3 leading-tight">Subscribe to Our Newsletter</h2>
                                <p class="text-white/90">Get latest health tips, package offers, and hospital announcements directly in your inbox.</p>
                                <div class="mt-6 flex flex-wrap gap-2 text-xs">
                                    <span class="px-3 py-1 rounded-full bg-white/20">Weekly insights</span>
                                    <span class="px-3 py-1 rounded-full bg-white/20">No spam</span>
                                    <span class="px-3 py-1 rounded-full bg-white/20">Instant updates</span>
                                </div>
                            </div>
                            <div class="rounded-2xl border border-slate-200 bg-slate-50 p-5 md:p-6 flex flex-col justify-center">
                                <p class="text-sm text-slate-600 mb-3 font-medium">Enter your email to join our subscriber list.</p>
                                <div v-if="newsletterSuccess" class="text-green-600 font-semibold text-center py-3 mb-3">
                                    ✅ Subscribed successfully. Thank you!
                                </div>
                                <form @submit.prevent="submitNewsletter" class="space-y-3">
                                    <input v-model="newsletterEmail" type="email" required placeholder="name@email.com"
                                        class="w-full px-4 py-3 rounded-lg border border-slate-300 text-slate-800 focus:ring-2 focus:ring-blue-800 focus:border-transparent outline-none bg-white" />
                                    <button type="submit"
                                        class="w-full bg-gradient-to-r from-blue-800 to-sky-500 text-white px-6 py-3 rounded-lg font-semibold transition-all hover:shadow-lg">
                                        Subscribe Now
                                    </button>
                                </form>
                                <p class="text-xs text-slate-500 mt-3">By subscribing, you agree to receive healthcare updates from AMZ Hospital.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Partners marquee -->
            <div>
                <div class="text-center mb-6">
                    <p class="text-sm uppercase tracking-wider text-slate-500 font-semibold">Our Corporate Partners</p>
                </div>
                <div class="overflow-hidden" style="mask-image: linear-gradient(to right, transparent, black 8%, black 92%, transparent);">
                    <div class="flex items-center gap-4 animate-marquee" style="width: max-content; animation: marquee 26s linear infinite;">
                        <div v-for="(partner, i) in doubledPartners" :key="`${partner}-${i}`"
                            class="flex-shrink-0 w-[150px] h-[74px] border border-slate-200 rounded-2xl bg-white p-3 flex items-center justify-center shadow-lg">
                            <img :src="`https://logo.clearbit.com/${partner}`" :alt="partner"
                                class="w-full h-full object-contain grayscale hover:grayscale-0 transition-all" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ── CONTACT ────────────────────────────────────────── -->
    <section id="contact" role="region" aria-label="Contact information" class="py-20 bg-white">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-4">Contact Information</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Visit us or reach out for any inquiries about our services</p>
            </div>
            <div class="grid lg:grid-cols-3 gap-8 mb-12">
                <div class="bg-gradient-to-br from-blue-50 to-white rounded-2xl p-8 shadow-lg text-center hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-blue-800 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-map-marker-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Visit Us</h3>
                    <p class="text-gray-600">123 Medical Center Road<br>Dhaka 1205, Bangladesh</p>
                </div>
                <div class="bg-gradient-to-br from-green-50 to-white rounded-2xl p-8 shadow-lg text-center hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-phone-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Call Us</h3>
                    <p class="text-gray-600">
                        Emergency: <a href="tel:10699" class="text-blue-800 font-bold hover:underline">10699</a><br>
                        General: <a href="tel:+8801234567890" class="text-blue-800 hover:underline">+880 123 456 7890</a>
                    </p>
                </div>
                <div class="bg-gradient-to-br from-purple-50 to-white rounded-2xl p-8 shadow-lg text-center hover:shadow-xl transition">
                    <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-envelope text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-3">Email Us</h3>
                    <p class="text-gray-600">
                        <a href="mailto:info@amzhospital.com" class="text-blue-800 hover:underline">info@amzhospital.com</a><br>
                        <a href="mailto:emergency@amzhospital.com" class="text-blue-800 hover:underline">emergency@amzhospital.com</a>
                    </p>
                </div>
            </div>
            <div class="rounded-2xl overflow-hidden shadow-2xl h-96">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d233668.38703692693!2d90.25446292926457!3d23.780573258035956!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b8b087026b81%3A0x8fa563bbdd5904c2!2sDhaka!5e0!3m2!1sen!2sbd!4v1234567890123!5m2!1sen!2sbd"
                    width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"
                    referrerpolicy="no-referrer-when-downgrade"
                    class="grayscale hover:grayscale-0 transition duration-500">
                </iframe>
            </div>
        </div>
    </section>
</template>

<style>
@keyframes float {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

@keyframes marquee {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

@keyframes pageFadeIn {
    0% { opacity: 0; transform: translateY(8px); }
    100% { opacity: 1; transform: translateY(0); }
}

body {
    animation: pageFadeIn 0.7s ease-out;
}

::-webkit-scrollbar { width: 10px; }
::-webkit-scrollbar-track { background: #f1f5f9; }
::-webkit-scrollbar-thumb { background: #1e40af; border-radius: 5px; }
::-webkit-scrollbar-thumb:hover { background: #0ea5e9; }
</style>
