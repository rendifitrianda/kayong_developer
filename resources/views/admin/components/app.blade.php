<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="favicon.png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="css2?family=Nunito:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/perfect-scrollbar.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="assets/css/style.css">
    <link defer="" rel="stylesheet" type="text/css" media="screen" href="assets/css/animate.css">
    <script src="assets/js/perfect-scrollbar.min.js"></script>
    <script defer="" src="assets/js/popper.min.js"></script>
    <script defer="" src="assets/js/tippy-bundle.umd.min.js"></script>
    <script defer="" src="assets/js/sweetalert.min.js"></script>
</head>

<body x-data="main" class="relative overflow-x-hidden font-nunito text-sm font-normal antialiased"
    :class="[$store.app.sidebar ? 'toggle-sidebar' : '', $store.app.theme === 'dark' || $store.app.isDarkMode ? 'dark' : '',
        $store.app.menu, $store.app.layout, $store.app.rtlClass
    ]">
    <!-- sidebar menu overlay -->
    <div x-cloak="" class="fixed inset-0 z-50 bg-[black]/60 lg:hidden" :class="{ 'hidden': !$store.app.sidebar }"
        @click="$store.app.toggleSidebar()"></div>

    <!-- screen loader -->
    <div
        class="screen_loader animate__animated fixed inset-0 z-[60] grid place-content-center bg-[#fafafa] dark:bg-[#060818]">
        <svg width="64" height="64" viewbox="0 0 135 135" xmlns="http://www.w3.org/2000/svg" fill="#4361ee">
            <path
                d="M67.447 58c5.523 0 10-4.477 10-10s-4.477-10-10-10-10 4.477-10 10 4.477 10 10 10zm9.448 9.447c0 5.523 4.477 10 10 10 5.522 0 10-4.477 10-10s-4.478-10-10-10c-5.523 0-10 4.477-10 10zm-9.448 9.448c-5.523 0-10 4.477-10 10 0 5.522 4.477 10 10 10s10-4.478 10-10c0-5.523-4.477-10-10-10zM58 67.447c0-5.523-4.477-10-10-10s-10 4.477-10 10 4.477 10 10 10 10-4.477 10-10z">
                <animatetransform attributename="transform" type="rotate" from="0 67 67" to="-360 67 67" dur="2.5s"
                    repeatcount="indefinite"></animatetransform>
            </path>
            <path
                d="M28.19 40.31c6.627 0 12-5.374 12-12 0-6.628-5.373-12-12-12-6.628 0-12 5.372-12 12 0 6.626 5.372 12 12 12zm30.72-19.825c4.686 4.687 12.284 4.687 16.97 0 4.686-4.686 4.686-12.284 0-16.97-4.686-4.687-12.284-4.687-16.97 0-4.687 4.686-4.687 12.284 0 16.97zm35.74 7.705c0 6.627 5.37 12 12 12 6.626 0 12-5.373 12-12 0-6.628-5.374-12-12-12-6.63 0-12 5.372-12 12zm19.822 30.72c-4.686 4.686-4.686 12.284 0 16.97 4.687 4.686 12.285 4.686 16.97 0 4.687-4.686 4.687-12.284 0-16.97-4.685-4.687-12.283-4.687-16.97 0zm-7.704 35.74c-6.627 0-12 5.37-12 12 0 6.626 5.373 12 12 12s12-5.374 12-12c0-6.63-5.373-12-12-12zm-30.72 19.822c-4.686-4.686-12.284-4.686-16.97 0-4.686 4.687-4.686 12.285 0 16.97 4.686 4.687 12.284 4.687 16.97 0 4.687-4.685 4.687-12.283 0-16.97zm-35.74-7.704c0-6.627-5.372-12-12-12-6.626 0-12 5.373-12 12s5.374 12 12 12c6.628 0 12-5.373 12-12zm-19.823-30.72c4.687-4.686 4.687-12.284 0-16.97-4.686-4.686-12.284-4.686-16.97 0-4.687 4.686-4.687 12.284 0 16.97 4.686 4.687 12.284 4.687 16.97 0z">
                <animatetransform attributename="transform" type="rotate" from="0 67 67" to="360 67 67" dur="8s"
                    repeatcount="indefinite"></animatetransform>
            </path>
        </svg>
    </div>

    <!-- scroll to top button -->
    <div class="fixed bottom-6 z-50 ltr:right-6 rtl:left-6" x-data="scrollToTop">
        <template x-if="showTopButton">
            <button type="button"
                class="btn btn-outline-primary animate-pulse rounded-full bg-[#fafafa] p-2 dark:bg-[#060818] dark:hover:bg-primary"
                @click="goToTop">
                <svg width="24" height="24" class="h-4 w-4" viewbox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                        d="M12 20.75C12.4142 20.75 12.75 20.4142 12.75 20L12.75 10.75L11.25 10.75L11.25 20C11.25 20.4142 11.5858 20.75 12 20.75Z"
                        fill="currentColor"></path>
                    <path
                        d="M6.00002 10.75C5.69667 10.75 5.4232 10.5673 5.30711 10.287C5.19103 10.0068 5.25519 9.68417 5.46969 9.46967L11.4697 3.46967C11.6103 3.32902 11.8011 3.25 12 3.25C12.1989 3.25 12.3897 3.32902 12.5304 3.46967L18.5304 9.46967C18.7449 9.68417 18.809 10.0068 18.6929 10.287C18.5768 10.5673 18.3034 10.75 18 10.75L6.00002 10.75Z"
                        fill="currentColor"></path>
                </svg>
            </button>
        </template>
    </div>

    <!-- start theme customizer section -->
    <div x-data="customizer">
        <div class="fixed inset-0 z-[51] hidden bg-[black]/60 px-4 transition-[display]"
            :class="{ '!block': showCustomizer }" @click="showCustomizer = false"></div>

        <nav class="fixed top-0 bottom-0 z-[51] w-full max-w-[400px] bg-white p-4 shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-[right] duration-300 ltr:-right-[400px] rtl:-left-[400px] dark:bg-[#0e1726]"
            :class="{ 'ltr:!right-0 rtl:!left-0': showCustomizer }">
            <a href="javascript:;"
                class="absolute top-0 bottom-0 my-auto flex h-10 w-12 cursor-pointer items-center justify-center bg-primary text-white ltr:-left-12 ltr:rounded-tl-full ltr:rounded-bl-full rtl:-right-12 rtl:rounded-tr-full rtl:rounded-br-full"
                @click="showCustomizer = !showCustomizer">
                <svg width="24" height="24" viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"
                    class="h-5 w-5 animate-[spin_3s_linear_infinite]">
                    <circle cx="12" cy="12" r="3" stroke="currentColor" stroke-width="1.5"></circle>
                    <path opacity="0.5"
                        d="M13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74457 2.35523 9.35522 2.74458 9.15223 3.23463C9.05957 3.45834 9.0233 3.7185 9.00911 4.09799C8.98826 4.65568 8.70226 5.17189 8.21894 5.45093C7.73564 5.72996 7.14559 5.71954 6.65219 5.45876C6.31645 5.2813 6.07301 5.18262 5.83294 5.15102C5.30704 5.08178 4.77518 5.22429 4.35436 5.5472C4.03874 5.78938 3.80577 6.1929 3.33983 6.99993C2.87389 7.80697 2.64092 8.21048 2.58899 8.60491C2.51976 9.1308 2.66227 9.66266 2.98518 10.0835C3.13256 10.2756 3.3397 10.437 3.66119 10.639C4.1338 10.936 4.43789 11.4419 4.43786 12C4.43783 12.5581 4.13375 13.0639 3.66118 13.3608C3.33965 13.5629 3.13248 13.7244 2.98508 13.9165C2.66217 14.3373 2.51966 14.8691 2.5889 15.395C2.64082 15.7894 2.87379 16.193 3.33973 17C3.80568 17.807 4.03865 18.2106 4.35426 18.4527C4.77508 18.7756 5.30694 18.9181 5.83284 18.8489C6.07289 18.8173 6.31632 18.7186 6.65204 18.5412C7.14547 18.2804 7.73556 18.27 8.2189 18.549C8.70224 18.8281 8.98826 19.3443 9.00911 19.9021C9.02331 20.2815 9.05957 20.5417 9.15223 20.7654C9.35522 21.2554 9.74457 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8477 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.902C15.0117 19.3443 15.2977 18.8281 15.781 18.549C16.2643 18.2699 16.8544 18.2804 17.3479 18.5412C17.6836 18.7186 17.927 18.8172 18.167 18.8488C18.6929 18.9181 19.2248 18.7756 19.6456 18.4527C19.9612 18.2105 20.1942 17.807 20.6601 16.9999C21.1261 16.1929 21.3591 15.7894 21.411 15.395C21.4802 14.8691 21.3377 14.3372 21.0148 13.9164C20.8674 13.7243 20.6602 13.5628 20.3387 13.3608C19.8662 13.0639 19.5621 12.558 19.5621 11.9999C19.5621 11.4418 19.8662 10.9361 20.3387 10.6392C20.6603 10.4371 20.8675 10.2757 21.0149 10.0835C21.3378 9.66273 21.4803 9.13087 21.4111 8.60497C21.3592 8.21055 21.1262 7.80703 20.6602 7C20.1943 6.19297 19.9613 5.78945 19.6457 5.54727C19.2249 5.22436 18.693 5.08185 18.1671 5.15109C17.9271 5.18269 17.6837 5.28136 17.3479 5.4588C16.8545 5.71959 16.2644 5.73002 15.7811 5.45096C15.2977 5.17191 15.0117 4.65566 14.9909 4.09794C14.9767 3.71848 14.9404 3.45833 14.8477 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224Z"
                        stroke="currentColor" stroke-width="1.5"></path>
                </svg>
            </a>
            <div class="perfect-scrollbar h-full overflow-y-auto overflow-x-hidden">
                <div class="relative pb-5 text-center">
                    <a href="javascript:;"
                        class="absolute top-0 opacity-30 hover:opacity-100 ltr:right-0 rtl:left-0 dark:text-white"
                        @click="showCustomizer = false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24px" height="24px" viewbox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" class="h-5 w-5">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </a>
                    <h4 class="mb-1 dark:text-white">TEMPLATE CUSTOMIZER</h4>
                    <p class="text-white-dark">Set preferences that will be cookied for your live preview
                        demonstration.</p>
                </div>
                <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                    <h5 class="mb-1 text-base leading-none dark:text-white">Color Scheme</h5>
                    <p class="text-xs text-white-dark">Overall light or dark presentation.</p>
                    <div class="mt-3 grid grid-cols-3 gap-2">
                        <button type="button" class="btn"
                            :class="[$store.app.theme === 'light' ? 'btn-primary' : 'btn-outline-primary']"
                            @click="$store.app.toggleTheme('light')">
                            <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                                <circle cx="12" cy="12" r="5" stroke="currentColor"
                                    stroke-width="1.5"></circle>
                                <path d="M12 2V4" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                </path>
                                <path d="M12 20V22" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                </path>
                                <path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                </path>
                                <path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round"></path>
                                <path opacity="0.5" d="M19.7778 4.22266L17.5558 6.25424" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round"></path>
                                <path opacity="0.5" d="M4.22217 4.22266L6.44418 6.25424" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round"></path>
                                <path opacity="0.5" d="M6.44434 17.5557L4.22211 19.7779" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round"></path>
                                <path opacity="0.5" d="M19.7778 19.7773L17.5558 17.5551" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round"></path>
                            </svg>
                            Light
                        </button>
                        <button type="button" class="btn"
                            :class="[$store.app.theme === 'dark' ? 'btn-primary' : 'btn-outline-primary']"
                            @click="$store.app.toggleTheme('dark')">
                            <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z"
                                    fill="currentColor"></path>
                            </svg>
                            Dark
                        </button>
                        <button type="button" class="btn"
                            :class="[$store.app.theme === 'system' ? 'btn-primary' : 'btn-outline-primary']"
                            @click="$store.app.toggleTheme('system')">
                            <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 shrink-0 ltr:mr-2 rtl:ml-2">
                                <path
                                    d="M3 9C3 6.17157 3 4.75736 3.87868 3.87868C4.75736 3 6.17157 3 9 3H15C17.8284 3 19.2426 3 20.1213 3.87868C21 4.75736 21 6.17157 21 9V14C21 15.8856 21 16.8284 20.4142 17.4142C19.8284 18 18.8856 18 17 18H7C5.11438 18 4.17157 18 3.58579 17.4142C3 16.8284 3 15.8856 3 14V9Z"
                                    stroke="currentColor" stroke-width="1.5"></path>
                                <path opacity="0.5" d="M22 21H2" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round"></path>
                                <path opacity="0.5" d="M15 15H9" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round"></path>
                            </svg>
                            System
                        </button>
                    </div>
                </div>

                <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                    <h5 class="mb-1 text-base leading-none dark:text-white">Navigation Position</h5>
                    <p class="text-xs text-white-dark">Select the primary navigation paradigm for your app.</p>
                    <div class="mt-3 grid grid-cols-3 gap-2">
                        <button type="button" class="btn"
                            :class="[$store.app.menu === 'horizontal' ? 'btn-primary' : 'btn-outline-primary']"
                            @click="$store.app.toggleMenu('horizontal')">
                            Horizontal
                        </button>
                        <button type="button" class="btn"
                            :class="[$store.app.menu === 'vertical' ? 'btn-primary' : 'btn-outline-primary']"
                            @click="$store.app.toggleMenu('vertical')">
                            Vertical
                        </button>
                        <button type="button" class="btn"
                            :class="[$store.app.menu === 'collapsible-vertical' ? 'btn-primary' : 'btn-outline-primary']"
                            @click="$store.app.toggleMenu('collapsible-vertical')">
                            Collapsible
                        </button>
                    </div>
                    <div class="mt-5 text-primary">
                        <label class="mb-0 inline-flex">
                            <input x-model="$store.app.semidark" type="checkbox" :value="true"
                                class="form-checkbox" @change="$store.app.toggleSemidark()">
                            <span>Semi Dark (Sidebar & Header)</span>
                        </label>
                    </div>
                </div>
                <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                    <h5 class="mb-1 text-base leading-none dark:text-white">Layout Style</h5>
                    <p class="text-xs text-white-dark">Select the primary layout style for your app.</p>
                    <div class="mt-3 flex gap-2">
                        <button type="button" class="btn flex-auto"
                            :class="[$store.app.layout === 'boxed-layout' ? 'btn-primary' : 'btn-outline-primary']"
                            @click="$store.app.toggleLayout('boxed-layout')">
                            Box
                        </button>
                        <button type="button" class="btn flex-auto"
                            :class="[$store.app.layout === 'full' ? 'btn-primary' : 'btn-outline-primary']"
                            @click="$store.app.toggleLayout('full')">
                            Full
                        </button>
                    </div>
                </div>
                <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                    <h5 class="mb-1 text-base leading-none dark:text-white">Direction</h5>
                    <p class="text-xs text-white-dark">Select the direction for your app.</p>
                    <div class="mt-3 flex gap-2">
                        <button type="button" class="btn flex-auto"
                            :class="[$store.app.rtlClass === 'ltr' ? 'btn-primary' : 'btn-outline-primary']"
                            @click="$store.app.toggleRTL('ltr')">
                            LTR
                        </button>
                        <button type="button" class="btn flex-auto"
                            :class="[$store.app.rtlClass === 'rtl' ? 'btn-primary' : 'btn-outline-primary']"
                            @click="$store.app.toggleRTL('rtl')">
                            RTL
                        </button>
                    </div>
                </div>

                <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                    <h5 class="mb-1 text-base leading-none dark:text-white">Navbar Type</h5>
                    <p class="text-xs text-white-dark">Sticky or Floating.</p>
                    <div class="mt-3 flex items-center gap-3 text-primary">
                        <label class="mb-0 inline-flex">
                            <input x-model="$store.app.navbar" type="radio" value="navbar-sticky"
                                class="form-radio" @change="$store.app.toggleNavbar()">
                            <span>Sticky</span>
                        </label>
                        <label class="mb-0 inline-flex">
                            <input x-model="$store.app.navbar" type="radio" value="navbar-floating"
                                class="form-radio" @change="$store.app.toggleNavbar()">
                            <span>Floating</span>
                        </label>
                        <label class="mb-0 inline-flex">
                            <input x-model="$store.app.navbar" type="radio" value="navbar-static"
                                class="form-radio" @change="$store.app.toggleNavbar()">
                            <span>Static</span>
                        </label>
                    </div>
                </div>

                <div class="mb-3 rounded-md border border-dashed border-[#e0e6ed] p-3 dark:border-[#1b2e4b]">
                    <h5 class="mb-1 text-base leading-none dark:text-white">Router Transition</h5>
                    <p class="text-xs text-white-dark">Animation of main content.</p>
                    <div class="mt-3">
                        <select x-model="$store.app.animation" class="form-select border-primary text-primary"
                            @change="$store.app.toggleAnimation()">
                            <option value="">None</option>
                            <option value="animate__fadeIn">Fade</option>
                            <option value="animate__fadeInDown">Fade Down</option>
                            <option value="animate__fadeInUp">Fade Up</option>
                            <option value="animate__fadeInLeft">Fade Left</option>
                            <option value="animate__fadeInRight">Fade Right</option>
                            <option value="animate__slideInDown">Slide Down</option>
                            <option value="animate__slideInLeft">Slide Left</option>
                            <option value="animate__slideInRight">Slide Right</option>
                            <option value="animate__zoomIn">Zoom In</option>
                        </select>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- end theme customizer section -->

    <div class="main-container min-h-screen text-black dark:text-white-dark" :class="[$store.app.navbar]">
        <!-- start sidebar section -->
        <div :class="{ 'dark text-white-dark': $store.app.semidark }">
            <nav x-data="sidebar"
                class="sidebar fixed top-0 bottom-0 z-50 h-full min-h-screen w-[260px] shadow-[5px_0_25px_0_rgba(94,92,154,0.1)] transition-all duration-300">
                <div class="h-full bg-white dark:bg-[#0e1726]">
                    <div class="flex items-center justify-between px-4 py-3">
                        <a href="index.html" class="main-logo flex shrink-0 items-center">
                            <img class="ml-[5px] w-8 flex-none" src="assets/images/logo.png" alt="image">
                            <span
                                class="align-middle text-2xl font-semibold ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light lg:inline">StarCode
                                Kh</span>
                        </a>
                        <a href="javascript:;"
                            class="collapse-icon flex h-8 w-8 items-center rounded-full transition duration-300 hover:bg-gray-500/10 rtl:rotate-180 dark:text-white-light dark:hover:bg-dark-light/10"
                            @click="$store.app.toggleSidebar()">
                            <svg class="m-auto h-5 w-5" width="20" height="20" viewbox="0 0 24 24"
                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13 19L7 12L13 5" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path opacity="0.5" d="M16.9998 19L10.9998 12L16.9998 5" stroke="currentColor"
                                    stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                            </svg>
                        </a>
                    </div>
                    <ul class="perfect-scrollbar relative h-[calc(100vh-80px)] space-y-0.5 overflow-y-auto overflow-x-hidden p-4 py-0 font-semibold"
                        x-data="{ activeDropdown: null }">
                        <li class="menu nav-item">
                            <button type="button" class="nav-link group"
                                :class="{ 'active': activeDropdown === 'dashboard' }"
                                @click="activeDropdown === 'dashboard' ? activeDropdown = null : activeDropdown = 'dashboard'">
                                <div class="flex items-center">
                                    <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                            fill="currentColor"></path>
                                    </svg>

                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Dashboard</span>
                                </div>
                                <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'dashboard' }">
                                    <svg width="16" height="16" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </button>
                            <ul x-cloak="" x-show="activeDropdown === 'dashboard'" x-collapse=""
                                class="sub-menu text-gray-500">
                                <li>
                                    <a href="index.html">Sales</a>
                                </li>
                                <li>
                                    <a href="analytics.html">Analytics</a>
                                </li>
                                <li>
                                    <a href="finance.html">Finance</a>
                                </li>
                                <li>
                                    <a href="crypto.html">Crypto</a>
                                </li>
                            </ul>
                        </li>

                        <h2
                            class="-mx-4 mb-1 flex items-center bg-white-light/30 py-3 px-7 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                            <svg class="hidden h-5 w-4 flex-none" viewbox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            <span>Apps</span>
                        </h2>

                        <li class="nav-item">
                            <ul>
                                <li class="nav-item">
                                    <a href="apps-chat.html" class="active group">
                                        <div class="flex items-center">
                                            <svg class="shrink-0 group-hover:!text-primary" width="20"
                                                height="20" viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.4036 22.4797L10.6787 22.015C11.1195 21.2703 11.3399 20.8979 11.691 20.6902C12.0422 20.4825 12.5001 20.4678 13.4161 20.4385C14.275 20.4111 14.8523 20.3361 15.3458 20.1317C16.385 19.7012 17.2106 18.8756 17.641 17.8365C17.9639 17.0571 17.9639 16.0691 17.9639 14.093V13.2448C17.9639 10.4683 17.9639 9.08006 17.3389 8.06023C16.9892 7.48958 16.5094 7.0098 15.9388 6.66011C14.919 6.03516 13.5307 6.03516 10.7542 6.03516H8.20964C5.43314 6.03516 4.04489 6.03516 3.02507 6.66011C2.45442 7.0098 1.97464 7.48958 1.62495 8.06023C1 9.08006 1 10.4683 1 13.2448V14.093C1 16.0691 1 17.0571 1.32282 17.8365C1.75326 18.8756 2.57886 19.7012 3.61802 20.1317C4.11158 20.3361 4.68882 20.4111 5.5477 20.4385C6.46368 20.4678 6.92167 20.4825 7.27278 20.6902C7.6239 20.8979 7.84431 21.2703 8.28514 22.015L8.5602 22.4797C8.97002 23.1721 9.9938 23.1721 10.4036 22.4797ZM13.1928 14.5171C13.7783 14.5171 14.253 14.0424 14.253 13.4568C14.253 12.8713 13.7783 12.3966 13.1928 12.3966C12.6072 12.3966 12.1325 12.8713 12.1325 13.4568C12.1325 14.0424 12.6072 14.5171 13.1928 14.5171ZM10.5422 13.4568C10.5422 14.0424 10.0675 14.5171 9.48193 14.5171C8.89637 14.5171 8.42169 14.0424 8.42169 13.4568C8.42169 12.8713 8.89637 12.3966 9.48193 12.3966C10.0675 12.3966 10.5422 12.8713 10.5422 13.4568ZM5.77108 14.5171C6.35664 14.5171 6.83133 14.0424 6.83133 13.4568C6.83133 12.8713 6.35664 12.3966 5.77108 12.3966C5.18553 12.3966 4.71084 12.8713 4.71084 13.4568C4.71084 14.0424 5.18553 14.5171 5.77108 14.5171Z"
                                                    fill="currentColor"></path>
                                                <path opacity="0.5"
                                                    d="M15.486 1C16.7529 0.999992 17.7603 0.999986 18.5683 1.07681C19.3967 1.15558 20.0972 1.32069 20.7212 1.70307C21.3632 2.09648 21.9029 2.63623 22.2963 3.27821C22.6787 3.90219 22.8438 4.60265 22.9226 5.43112C22.9994 6.23907 22.9994 7.24658 22.9994 8.51343V9.37869C22.9994 10.2803 22.9994 10.9975 22.9597 11.579C22.9191 12.174 22.8344 12.6848 22.6362 13.1632C22.152 14.3323 21.2232 15.2611 20.0541 15.7453C20.0249 15.7574 19.9955 15.7691 19.966 15.7804C19.8249 15.8343 19.7039 15.8806 19.5978 15.915H17.9477C17.9639 15.416 17.9639 14.8217 17.9639 14.093V13.2448C17.9639 10.4683 17.9639 9.08006 17.3389 8.06023C16.9892 7.48958 16.5094 7.0098 15.9388 6.66011C14.919 6.03516 13.5307 6.03516 10.7542 6.03516H8.20964C7.22423 6.03516 6.41369 6.03516 5.73242 6.06309V4.4127C5.76513 4.29934 5.80995 4.16941 5.86255 4.0169C5.95202 3.75751 6.06509 3.51219 6.20848 3.27821C6.60188 2.63623 7.14163 2.09648 7.78361 1.70307C8.40759 1.32069 9.10805 1.15558 9.93651 1.07681C10.7445 0.999986 11.7519 0.999992 13.0188 1H15.486Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span
                                                class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Chat</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-mailbox.html" class="group">
                                        <div class="flex items-center">
                                            <svg class="shrink-0 group-hover:!text-primary" width="20"
                                                height="20" viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M24 5C24 6.65685 22.6569 8 21 8C19.3431 8 18 6.65685 18 5C18 3.34315 19.3431 2 21 2C22.6569 2 24 3.34315 24 5Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M17.2339 7.46394L15.6973 8.74444C14.671 9.59966 13.9585 10.1915 13.357 10.5784C12.7747 10.9529 12.3798 11.0786 12.0002 11.0786C11.6206 11.0786 11.2258 10.9529 10.6435 10.5784C10.0419 10.1915 9.32941 9.59966 8.30315 8.74444L5.92837 6.76546C5.57834 6.47377 5.05812 6.52106 4.76643 6.87109C4.47474 7.22112 4.52204 7.74133 4.87206 8.03302L7.28821 10.0465C8.2632 10.859 9.05344 11.5176 9.75091 11.9661C10.4775 12.4334 11.185 12.7286 12.0002 12.7286C12.8154 12.7286 13.523 12.4334 14.2495 11.9661C14.947 11.5176 15.7372 10.859 16.7122 10.0465L18.3785 8.65795C17.9274 8.33414 17.5388 7.92898 17.2339 7.46394Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M18.4538 6.58719C18.7362 6.53653 19.0372 6.63487 19.234 6.87109C19.3965 7.06614 19.4538 7.31403 19.4121 7.54579C19.0244 7.30344 18.696 6.97499 18.4538 6.58719Z"
                                                    fill="currentColor"></path>
                                                <path opacity="0.5"
                                                    d="M16.9576 3.02099C16.156 3 15.2437 3 14.2 3H9.8C5.65164 3 3.57746 3 2.28873 4.31802C1 5.63604 1 7.75736 1 12C1 16.2426 1 18.364 2.28873 19.682C3.57746 21 5.65164 21 9.8 21H14.2C18.3484 21 20.4225 21 21.7113 19.682C23 18.364 23 16.2426 23 12C23 10.9326 23 9.99953 22.9795 9.1797C22.3821 9.47943 21.7103 9.64773 21 9.64773C18.5147 9.64773 16.5 7.58722 16.5 5.04545C16.5 4.31904 16.6646 3.63193 16.9576 3.02099Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span
                                                class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Mailbox</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-todolist.html" class="group">
                                        <div class="flex items-center">
                                            <svg class="shrink-0 group-hover:!text-primary" width="20"
                                                height="20" viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5"
                                                    d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 5.25C12.4142 5.25 12.75 5.58579 12.75 6V7.25H14C14.4142 7.25 14.75 7.58579 14.75 8C14.75 8.41421 14.4142 8.75 14 8.75L12.75 8.75L12.75 10C12.75 10.4142 12.4142 10.75 12 10.75C11.5858 10.75 11.25 10.4142 11.25 10L11.25 8.75H9.99997C9.58575 8.75 9.24997 8.41421 9.24997 8C9.24997 7.58579 9.58575 7.25 9.99997 7.25H11.25L11.25 6C11.25 5.58579 11.5858 5.25 12 5.25ZM7.25 14C7.25 13.5858 7.58579 13.25 8 13.25H16C16.4142 13.25 16.75 13.5858 16.75 14C16.75 14.4142 16.4142 14.75 16 14.75H8C7.58579 14.75 7.25 14.4142 7.25 14ZM8.25 18C8.25 17.5858 8.58579 17.25 9 17.25H15C15.4142 17.25 15.75 17.5858 15.75 18C15.75 18.4142 15.4142 18.75 15 18.75H9C8.58579 18.75 8.25 18.4142 8.25 18Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span
                                                class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Todo
                                                List</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-notes.html" class="group">
                                        <div class="flex items-center">
                                            <svg class="shrink-0 group-hover:!text-primary" width="20"
                                                height="20" viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5"
                                                    d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.25 12C7.25 11.5858 7.58579 11.25 8 11.25H16C16.4142 11.25 16.75 11.5858 16.75 12C16.75 12.4142 16.4142 12.75 16 12.75H8C7.58579 12.75 7.25 12.4142 7.25 12Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.25 8C7.25 7.58579 7.58579 7.25 8 7.25H16C16.4142 7.25 16.75 7.58579 16.75 8C16.75 8.41421 16.4142 8.75 16 8.75H8C7.58579 8.75 7.25 8.41421 7.25 8Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M7.25 16C7.25 15.5858 7.58579 15.25 8 15.25H13C13.4142 15.25 13.75 15.5858 13.75 16C13.75 16.4142 13.4142 16.75 13 16.75H8C7.58579 16.75 7.25 16.4142 7.25 16Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span
                                                class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Notes</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-scrumboard.html" class="group">
                                        <div class="flex items-center">
                                            <svg class="shrink-0 group-hover:!text-primary" width="20"
                                                height="20" viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5"
                                                    d="M21 15.9983V9.99826C21 7.16983 21 5.75562 20.1213 4.87694C19.3529 4.10856 18.175 4.01211 16 4H8C5.82497 4.01211 4.64706 4.10856 3.87868 4.87694C3 5.75562 3 7.16983 3 9.99826V15.9983C3 18.8267 3 20.2409 3.87868 21.1196C4.75736 21.9983 6.17157 21.9983 9 21.9983H15C17.8284 21.9983 19.2426 21.9983 20.1213 21.1196C21 20.2409 21 18.8267 21 15.9983Z"
                                                    fill="currentColor"></path>
                                                <path
                                                    d="M8 3.5C8 2.67157 8.67157 2 9.5 2H14.5C15.3284 2 16 2.67157 16 3.5V4.5C16 5.32843 15.3284 6 14.5 6H9.5C8.67157 6 8 5.32843 8 4.5V3.5Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 9.25C12.4142 9.25 12.75 9.58579 12.75 10V12.25L15 12.25C15.4142 12.25 15.75 12.5858 15.75 13C15.75 13.4142 15.4142 13.75 15 13.75L12.75 13.75L12.75 16C12.75 16.4142 12.4142 16.75 12 16.75C11.5858 16.75 11.25 16.4142 11.25 16L11.25 13.75H9C8.58579 13.75 8.25 13.4142 8.25 13C8.25 12.5858 8.58579 12.25 9 12.25L11.25 12.25L11.25 10C11.25 9.58579 11.5858 9.25 12 9.25Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span
                                                class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Scrumboard</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-contacts.html" class="group">
                                        <div class="flex items-center">
                                            <svg class="shrink-0 group-hover:!text-primary" width="20"
                                                height="20" viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5"
                                                    d="M19.7165 20.3624C21.143 19.5846 22 18.5873 22 17.5C22 16.3475 21.0372 15.2961 19.4537 14.5C17.6226 13.5794 14.9617 13 12 13C9.03833 13 6.37738 13.5794 4.54631 14.5C2.96285 15.2961 2 16.3475 2 17.5C2 18.6525 2.96285 19.7039 4.54631 20.5C6.37738 21.4206 9.03833 22 12 22C15.1066 22 17.8823 21.3625 19.7165 20.3624Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M5 8.51464C5 4.9167 8.13401 2 12 2C15.866 2 19 4.9167 19 8.51464C19 12.0844 16.7658 16.2499 13.2801 17.7396C12.4675 18.0868 11.5325 18.0868 10.7199 17.7396C7.23416 16.2499 5 12.0844 5 8.51464ZM12 11C13.1046 11 14 10.1046 14 9C14 7.89543 13.1046 7 12 7C10.8954 7 10 7.89543 10 9C10 10.1046 10.8954 11 12 11Z"
                                                    fill="currentColor"></path>
                                            </svg>

                                            <span
                                                class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Contacts</span>
                                        </div>
                                    </a>
                                </li>
                                <li class="menu nav-item">
                                    <button type="button" class="nav-link group"
                                        :class="{ 'active': activeDropdown === 'invoice' }"
                                        @click="activeDropdown === 'invoice' ? activeDropdown = null : activeDropdown = 'invoice'">
                                        <div class="flex items-center">
                                            <svg class="shrink-0 group-hover:!text-primary" width="20"
                                                height="20" viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M12 5.25C12.4142 5.25 12.75 5.58579 12.75 6V6.31673C14.3804 6.60867 15.75 7.83361 15.75 9.5C15.75 9.91421 15.4142 10.25 15 10.25C14.5858 10.25 14.25 9.91421 14.25 9.5C14.25 8.82154 13.6859 8.10339 12.75 7.84748V11.3167C14.3804 11.6087 15.75 12.8336 15.75 14.5C15.75 16.1664 14.3804 17.3913 12.75 17.6833V18C12.75 18.4142 12.4142 18.75 12 18.75C11.5858 18.75 11.25 18.4142 11.25 18V17.6833C9.61957 17.3913 8.25 16.1664 8.25 14.5C8.25 14.0858 8.58579 13.75 9 13.75C9.41421 13.75 9.75 14.0858 9.75 14.5C9.75 15.1785 10.3141 15.8966 11.25 16.1525V12.6833C9.61957 12.3913 8.25 11.1664 8.25 9.5C8.25 7.83361 9.61957 6.60867 11.25 6.31673V6C11.25 5.58579 11.5858 5.25 12 5.25ZM11.25 7.84748C10.3141 8.10339 9.75 8.82154 9.75 9.5C9.75 10.1785 10.3141 10.8966 11.25 11.1525V7.84748ZM14.25 14.5C14.25 13.8215 13.6859 13.1034 12.75 12.8475V16.1525C13.6859 15.8966 14.25 15.1785 14.25 14.5Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span
                                                class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Invoice</span>
                                        </div>
                                        <div class="rtl:rotate-180"
                                            :class="{ '!rotate-90': activeDropdown === 'invoice' }">
                                            <svg width="16" height="16" viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <ul x-cloak="" x-show="activeDropdown === 'invoice'" x-collapse=""
                                        class="sub-menu text-gray-500">
                                        <li>
                                            <a href="apps-invoice-list.html">List</a>
                                        </li>
                                        <li>
                                            <a href="apps-invoice-preview.html">Preview</a>
                                        </li>
                                        <li>
                                            <a href="apps-invoice-add.html">Add</a>
                                        </li>
                                        <li>
                                            <a href="apps-invoice-edit.html">Edit</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item">
                                    <a href="apps-calendar.html" class="group">
                                        <div class="flex items-center">
                                            <svg class="shrink-0 group-hover:!text-primary" width="20"
                                                height="20" viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.94028 2C7.35614 2 7.69326 2.32421 7.69326 2.72414V4.18487C8.36117 4.17241 9.10983 4.17241 9.95219 4.17241H13.9681C14.8104 4.17241 15.5591 4.17241 16.227 4.18487V2.72414C16.227 2.32421 16.5641 2 16.98 2C17.3958 2 17.733 2.32421 17.733 2.72414V4.24894C19.178 4.36022 20.1267 4.63333 20.8236 5.30359C21.5206 5.97385 21.8046 6.88616 21.9203 8.27586L22 9H2.92456H2V8.27586C2.11571 6.88616 2.3997 5.97385 3.09665 5.30359C3.79361 4.63333 4.74226 4.36022 6.1873 4.24894V2.72414C6.1873 2.32421 6.52442 2 6.94028 2Z"
                                                    fill="currentColor"></path>
                                                <path opacity="0.5"
                                                    d="M21.9995 14.0001V12.0001C21.9995 11.161 21.9963 9.66527 21.9834 9H2.00917C1.99626 9.66527 1.99953 11.161 1.99953 12.0001V14.0001C1.99953 17.7713 1.99953 19.6569 3.1711 20.8285C4.34267 22.0001 6.22829 22.0001 9.99953 22.0001H13.9995C17.7708 22.0001 19.6564 22.0001 20.828 20.8285C21.9995 19.6569 21.9995 17.7713 21.9995 14.0001Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            <span
                                                class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Calendar</span>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <h2
                            class="-mx-4 mb-1 flex items-center bg-white-light/30 py-3 px-7 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                            <svg class="hidden h-5 w-4 flex-none" viewbox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            <span>USER INTERFACE</span>
                        </h2>

                        <li class="menu nav-item">
                            <button type="button" class="nav-link group"
                                :class="{ 'active': activeDropdown === 'components' }"
                                @click="activeDropdown === 'components' ? activeDropdown = null : activeDropdown = 'components'">
                                <div class="flex items-center">
                                    <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.42229 20.6181C10.1779 21.5395 11.0557 22.0001 12 22.0001V12.0001L2.63802 7.07275C2.62423 7.09491 2.6107 7.11727 2.5974 7.13986C2 8.15436 2 9.41678 2 11.9416V12.0586C2 14.5834 2 15.8459 2.5974 16.8604C3.19479 17.8749 4.27063 18.4395 6.42229 19.5686L8.42229 20.6181Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.7"
                                            d="M17.5774 4.43152L15.5774 3.38197C13.8218 2.46066 12.944 2 11.9997 2C11.0554 2 10.1776 2.46066 8.42197 3.38197L6.42197 4.43152C4.31821 5.53552 3.24291 6.09982 2.6377 7.07264L11.9997 12L21.3617 7.07264C20.7564 6.09982 19.6811 5.53552 17.5774 4.43152Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.5"
                                            d="M21.4026 7.13986C21.3893 7.11727 21.3758 7.09491 21.362 7.07275L12 12.0001V22.0001C12.9443 22.0001 13.8221 21.5395 15.5777 20.6181L17.5777 19.5686C19.7294 18.4395 20.8052 17.8749 21.4026 16.8604C22 15.8459 22 14.5834 22 12.0586V11.9416C22 9.41678 22 8.15436 21.4026 7.13986Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Components</span>
                                </div>
                                <div class="rtl:rotate-180"
                                    :class="{ '!rotate-90': activeDropdown === 'components' }">
                                    <svg width="16" height="16" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </button>
                            <ul x-cloak="" x-show="activeDropdown === 'components'" x-collapse=""
                                class="sub-menu text-gray-500">
                                <li>
                                    <a href="components-tabs.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="components-accordions.html">Accordions</a>
                                </li>
                                <li>
                                    <a href="components-modals.html">Modals</a>
                                </li>
                                <li>
                                    <a href="components-cards.html">Cards</a>
                                </li>
                                <li>
                                    <a href="components-carousel.html">Carousel</a>
                                </li>
                                <li>
                                    <a href="components-countdown.html">Countdown</a>
                                </li>
                                <li>
                                    <a href="components-counter.html">Counter</a>
                                </li>
                                <li>
                                    <a href="components-sweetalert.html">Sweet Alerts</a>
                                </li>
                                <li>
                                    <a href="components-timeline.html">Timeline</a>
                                </li>
                                <li>
                                    <a href="components-notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="components-media-object.html">Media Object</a>
                                </li>
                                <li>
                                    <a href="components-list-group.html">List Group</a>
                                </li>
                                <li>
                                    <a href="components-pricing-table.html">Pricing Tables</a>
                                </li>
                                <li>
                                    <a href="components-lightbox.html">Lightbox</a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu nav-item">
                            <button type="button" class="nav-link group"
                                :class="{ 'active': activeDropdown === 'elements' }"
                                @click="activeDropdown === 'elements' ? activeDropdown = null : activeDropdown = 'elements'">
                                <div class="flex items-center">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="shrink-0 group-hover:!text-primary">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.73167 5.77133L5.66953 9.91436C4.3848 11.6526 3.74244 12.5217 4.09639 13.205C4.10225 13.2164 4.10829 13.2276 4.1145 13.2387C4.48945 13.9117 5.59888 13.9117 7.81775 13.9117C9.05079 13.9117 9.6673 13.9117 10.054 14.2754L10.074 14.2946L13.946 9.72466L13.926 9.70541C13.5474 9.33386 13.5474 8.74151 13.5474 7.55682V7.24712C13.5474 3.96249 13.5474 2.32018 12.6241 2.03721C11.7007 1.75425 10.711 3.09327 8.73167 5.77133Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.5"
                                            d="M10.4527 16.4432L10.4527 16.7528C10.4527 20.0374 10.4527 21.6798 11.376 21.9627C12.2994 22.2457 13.2891 20.9067 15.2685 18.2286L18.3306 14.0856C19.6154 12.3474 20.2577 11.4783 19.9038 10.7949C19.8979 10.7836 19.8919 10.7724 19.8857 10.7613C19.5107 10.0883 18.4013 10.0883 16.1824 10.0883C14.9494 10.0883 14.3329 10.0883 13.9462 9.72461L10.0742 14.2946C10.4528 14.6661 10.4527 15.2585 10.4527 16.4432Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Elements</span>
                                </div>
                                <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'elements' }">
                                    <svg width="16" height="16" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </button>
                            <ul x-cloak="" x-show="activeDropdown === 'elements'" x-collapse=""
                                class="sub-menu text-gray-500">
                                <li>
                                    <a href="elements-alerts.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="elements-avatar.html">Avatar</a>
                                </li>
                                <li>
                                    <a href="elements-badges.html">Badges</a>
                                </li>
                                <li>
                                    <a href="elements-breadcrumbs.html">Breadcrumbs</a>
                                </li>
                                <li>
                                    <a href="elements-buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="elements-buttons-group.html">Button Groups</a>
                                </li>
                                <li>
                                    <a href="elements-color-library.html">Color Library</a>
                                </li>
                                <li>
                                    <a href="elements-dropdown.html">Dropdown</a>
                                </li>
                                <li>
                                    <a href="elements-infobox.html">Infobox</a>
                                </li>
                                <li>
                                    <a href="elements-jumbotron.html">Jumbotron</a>
                                </li>
                                <li>
                                    <a href="elements-loader.html">Loader</a>
                                </li>
                                <li>
                                    <a href="elements-pagination.html">Pagination</a>
                                </li>
                                <li>
                                    <a href="elements-popovers.html">Popovers</a>
                                </li>
                                <li>
                                    <a href="elements-progress-bar.html">Progress Bar</a>
                                </li>
                                <li>
                                    <a href="elements-search.html">Search</a>
                                </li>
                                <li>
                                    <a href="elements-tooltips.html">Tooltips</a>
                                </li>
                                <li>
                                    <a href="elements-treeview.html">Treeview</a>
                                </li>
                                <li>
                                    <a href="elements-typography.html">Typography</a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu nav-item">
                            <a href="charts.html" class="nav-link group">
                                <div class="flex items-center">
                                    <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M6.22209 4.60105C6.66665 4.304 7.13344 4.04636 7.6171 3.82976C8.98898 3.21539 9.67491 2.9082 10.5875 3.4994C11.5 4.09061 11.5 5.06041 11.5 7.00001V8.50001C11.5 10.3856 11.5 11.3284 12.0858 11.9142C12.6716 12.5 13.6144 12.5 15.5 12.5H17C18.9396 12.5 19.9094 12.5 20.5006 13.4125C21.0918 14.3251 20.7846 15.011 20.1702 16.3829C19.9536 16.8666 19.696 17.3334 19.399 17.7779C18.3551 19.3402 16.8714 20.5578 15.1355 21.2769C13.3996 21.9959 11.4895 22.184 9.64665 21.8175C7.80383 21.4509 6.11109 20.5461 4.78249 19.2175C3.45389 17.8889 2.5491 16.1962 2.18254 14.3534C1.81598 12.5105 2.00412 10.6004 2.72315 8.86451C3.44218 7.12861 4.65982 5.64492 6.22209 4.60105Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M21.446 7.06901C20.6342 5.00831 18.9917 3.36579 16.931 2.55398C15.3895 1.94669 14 3.34316 14 5.00002V9.00002C14 9.5523 14.4477 10 15 10H19C20.6569 10 22.0533 8.61055 21.446 7.06901Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Charts</span>
                                </div>
                            </a>
                        </li>

                        <li class="menu nav-item">
                            <a href="widgets.html" class="nav-link group">
                                <div class="flex items-center">
                                    <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M13 15.4C13 13.3258 13 12.2887 13.659 11.6444C14.318 11 15.3787 11 17.5 11C19.6213 11 20.682 11 21.341 11.6444C22 12.2887 22 13.3258 22 15.4V17.6C22 19.6742 22 20.7113 21.341 21.3556C20.682 22 19.6213 22 17.5 22C15.3787 22 14.318 22 13.659 21.3556C13 20.7113 13 19.6742 13 17.6V15.4Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M2 8.6C2 10.6742 2 11.7113 2.65901 12.3556C3.31802 13 4.37868 13 6.5 13C8.62132 13 9.68198 13 10.341 12.3556C11 11.7113 11 10.6742 11 8.6V6.4C11 4.32582 11 3.28873 10.341 2.64437C9.68198 2 8.62132 2 6.5 2C4.37868 2 3.31802 2 2.65901 2.64437C2 3.28873 2 4.32582 2 6.4V8.6Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M13 5.5C13 4.4128 13 3.8692 13.1713 3.44041C13.3996 2.86867 13.8376 2.41443 14.389 2.17761C14.8024 2 15.3266 2 16.375 2H18.625C19.6734 2 20.1976 2 20.611 2.17761C21.1624 2.41443 21.6004 2.86867 21.8287 3.44041C22 3.8692 22 4.4128 22 5.5C22 6.5872 22 7.1308 21.8287 7.55959C21.6004 8.13133 21.1624 8.58557 20.611 8.82239C20.1976 9 19.6734 9 18.625 9H16.375C15.3266 9 14.8024 9 14.389 8.82239C13.8376 8.58557 13.3996 8.13133 13.1713 7.55959C13 7.1308 13 6.5872 13 5.5Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.5"
                                            d="M2 18.5C2 19.5872 2 20.1308 2.17127 20.5596C2.39963 21.1313 2.83765 21.5856 3.38896 21.8224C3.80245 22 4.32663 22 5.375 22H7.625C8.67337 22 9.19755 22 9.61104 21.8224C10.1624 21.5856 10.6004 21.1313 10.8287 20.5596C11 20.1308 11 19.5872 11 18.5C11 17.4128 11 16.8692 10.8287 16.4404C10.6004 15.8687 10.1624 15.4144 9.61104 15.1776C9.19755 15 8.67337 15 7.625 15H5.375C4.32663 15 3.80245 15 3.38896 15.1776C2.83765 15.4144 2.39963 15.8687 2.17127 16.4404C2 16.8692 2 17.4128 2 18.5Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Widgets</span>
                                </div>
                            </a>
                        </li>

                        <li class="menu nav-item">
                            <a href="font-icons.html" class="nav-link group">
                                <div class="flex items-center">
                                    <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M12 6.75C9.1005 6.75 6.75 9.1005 6.75 12C6.75 14.8995 9.1005 17.25 12 17.25C12.4142 17.25 12.75 17.5858 12.75 18C12.75 18.4142 12.4142 18.75 12 18.75C8.27208 18.75 5.25 15.7279 5.25 12C5.25 8.27208 8.27208 5.25 12 5.25C15.7279 5.25 18.75 8.27208 18.75 12C18.75 12.8103 18.6069 13.5889 18.3439 14.3108C18.211 14.6756 17.9855 14.9732 17.7354 15.204L17.6548 15.2783C16.8451 16.0252 15.6294 16.121 14.7127 15.5099C14.3431 15.2635 14.0557 14.9233 13.8735 14.5325C13.3499 14.9205 12.7017 15.15 12 15.15C10.2603 15.15 8.85 13.7397 8.85 12C8.85 10.2603 10.2603 8.85 12 8.85C13.7397 8.85 15.15 10.2603 15.15 12V13.5241C15.15 13.8206 15.2981 14.0974 15.5448 14.2618C15.8853 14.4888 16.3369 14.4533 16.6377 14.1758L16.7183 14.1015C16.8295 13.9989 16.8991 13.8944 16.9345 13.7973C17.1384 13.2376 17.25 12.6327 17.25 12C17.25 9.1005 14.8995 6.75 12 6.75ZM12 10.35C12.9113 10.35 13.65 11.0887 13.65 12C13.65 12.9113 12.9113 13.65 12 13.65C11.0887 13.65 10.35 12.9113 10.35 12C10.35 11.0887 11.0887 10.35 12 10.35Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Font
                                        Icons</span>
                                </div>
                            </a>
                        </li>

                        <li class="menu nav-item">
                            <a href="dragndrop.html" class="nav-link group">
                                <div class="flex items-center">
                                    <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M13.25 7C13.25 7.41421 13.5858 7.75 14 7.75H15.1893L12.9697 9.96967C12.6768 10.2626 12.6768 10.7374 12.9697 11.0303C13.2626 11.3232 13.7374 11.3232 14.0303 11.0303L16.25 8.81066V10C16.25 10.4142 16.5858 10.75 17 10.75C17.4142 10.75 17.75 10.4142 17.75 10V7C17.75 6.58579 17.4142 6.25 17 6.25H14C13.5858 6.25 13.25 6.58579 13.25 7Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M11.0303 14.0303C11.3232 13.7374 11.3232 13.2626 11.0303 12.9697C10.7374 12.6768 10.2626 12.6768 9.96967 12.9697L7.75 15.1893V14C7.75 13.5858 7.41421 13.25 7 13.25C6.58579 13.25 6.25 13.5858 6.25 14V17C6.25 17.4142 6.58579 17.75 7 17.75H10C10.4142 17.75 10.75 17.4142 10.75 17C10.75 16.5858 10.4142 16.25 10 16.25H8.81066L11.0303 14.0303Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M10.75 7C10.75 7.41421 10.4142 7.75 10 7.75H8.81066L11.0303 9.96967C11.3232 10.2626 11.3232 10.7374 11.0303 11.0303C10.7374 11.3232 10.2626 11.3232 9.96967 11.0303L7.75 8.81066V10C7.75 10.4142 7.41421 10.75 7 10.75C6.58579 10.75 6.25 10.4142 6.25 10V7C6.25 6.58579 6.58579 6.25 7 6.25H10C10.4142 6.25 10.75 6.58579 10.75 7Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M12.9697 14.0303C12.6768 13.7374 12.6768 13.2626 12.9697 12.9697C13.2626 12.6768 13.7374 12.6768 14.0303 12.9697L16.25 15.1893V14C16.25 13.5858 16.5858 13.25 17 13.25C17.4142 13.25 17.75 13.5858 17.75 14V17C17.75 17.4142 17.4142 17.75 17 17.75H14C13.5858 17.75 13.25 17.4142 13.25 17C13.25 16.5858 13.5858 16.25 14 16.25H15.1893L12.9697 14.0303Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Drag
                                        and Drop</span>
                                </div>
                            </a>
                        </li>

                        <h2
                            class="-mx-4 mb-1 flex items-center bg-white-light/30 py-3 px-7 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                            <svg class="hidden h-5 w-4 flex-none" viewbox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            <span>TABLES AND FORMS</span>
                        </h2>

                        <li class="menu nav-item">
                            <a href="tables.html" class="nav-link group">
                                <div class="flex items-center">
                                    <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2C16.714 2 19.0711 2 20.5355 3.46447C22 4.92893 22 7.28595 22 12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M18.75 8C18.75 8.41421 18.4142 8.75 18 8.75H6C5.58579 8.75 5.25 8.41421 5.25 8C5.25 7.58579 5.58579 7.25 6 7.25H18C18.4142 7.25 18.75 7.58579 18.75 8Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M18.75 12C18.75 12.4142 18.4142 12.75 18 12.75H6C5.58579 12.75 5.25 12.4142 5.25 12C5.25 11.5858 5.58579 11.25 6 11.25H18C18.4142 11.25 18.75 11.5858 18.75 12Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M18.75 16C18.75 16.4142 18.4142 16.75 18 16.75H6C5.58579 16.75 5.25 16.4142 5.25 16C5.25 15.5858 5.58579 15.25 6 15.25H18C18.4142 15.25 18.75 15.5858 18.75 16Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Tables</span>
                                </div>
                            </a>
                        </li>

                        <li class="menu nav-item">
                            <button type="button" class="nav-link group"
                                :class="{ 'active': activeDropdown==='datatables' }"
                                @click="activeDropdown === 'datatables' ? activeDropdown = null : activeDropdown = 'datatables'">
                                <div class="flex items-center">
                                    <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M4.97883 9.68508C2.99294 8.89073 2 8.49355 2 8C2 7.50645 2.99294 7.10927 4.97883 6.31492L7.7873 5.19153C9.77318 4.39718 10.7661 4 12 4C13.2339 4 14.2268 4.39718 16.2127 5.19153L19.0212 6.31492C21.0071 7.10927 22 7.50645 22 8C22 8.49355 21.0071 8.89073 19.0212 9.68508L16.2127 10.8085C14.2268 11.6028 13.2339 12 12 12C10.7661 12 9.77318 11.6028 7.7873 10.8085L4.97883 9.68508Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2 8C2 8.49355 2.99294 8.89073 4.97883 9.68508L7.7873 10.8085C9.77318 11.6028 10.7661 12 12 12C13.2339 12 14.2268 11.6028 16.2127 10.8085L19.0212 9.68508C21.0071 8.89073 22 8.49355 22 8C22 7.50645 21.0071 7.10927 19.0212 6.31492L16.2127 5.19153C14.2268 4.39718 13.2339 4 12 4C10.7661 4 9.77318 4.39718 7.7873 5.19153L4.97883 6.31492C2.99294 7.10927 2 7.50645 2 8Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.7"
                                            d="M5.76613 10L4.97883 10.3149C2.99294 11.1093 2 11.5065 2 12C2 12.4935 2.99294 12.8907 4.97883 13.6851L7.7873 14.8085C9.77318 15.6028 10.7661 16 12 16C13.2339 16 14.2268 15.6028 16.2127 14.8085L19.0212 13.6851C21.0071 12.8907 22 12.4935 22 12C22 11.5065 21.0071 11.1093 19.0212 10.3149L18.2339 10L16.2127 10.8085C14.2268 11.6028 13.2339 12 12 12C10.7661 12 9.77318 11.6028 7.7873 10.8085L5.76613 10Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.4"
                                            d="M5.76613 14L4.97883 14.3149C2.99294 15.1093 2 15.5065 2 16C2 16.4935 2.99294 16.8907 4.97883 17.6851L7.7873 18.8085C9.77318 19.6028 10.7661 20 12 20C13.2339 20 14.2268 19.6028 16.2127 18.8085L19.0212 17.6851C21.0071 16.8907 22 16.4935 22 16C22 15.5065 21.0071 15.1093 19.0212 14.3149L18.2339 14L16.2127 14.8085C14.2268 15.6028 13.2339 16 12 16C10.7661 16 9.77318 15.6028 7.7873 14.8085L5.76613 14Z"
                                            fill="currentColor"></path>
                                    </svg>

                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Data
                                        Tables</span>
                                </div>
                                <div class="rtl:rotate-180"
                                    :class="{ '!rotate-90': activeDropdown === 'datatables' }">
                                    <svg width="16" height="16" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </button>
                            <ul x-cloak="" x-show="activeDropdown === 'datatables'" x-collapse=""
                                class="sub-menu text-gray-500">
                                <li>
                                    <a href="datatables-basic.html">Basic</a>
                                </li>
                                <li>
                                    <a href="datatables-advanced.html">Advanced</a>
                                </li>
                                <li>
                                    <a href="datatables-skin.html">Skin</a>
                                </li>
                                <li>
                                    <a href="datatables-order-sorting.html">Order Sorting</a>
                                </li>
                                <li>
                                    <a href="datatables-multi-column.html">Multi Column</a>
                                </li>
                                <li>
                                    <a href="datatables-multiple-tables.html">Multiple Tables</a>
                                </li>
                                <li>
                                    <a href="datatables-alt-pagination.html">Alt. Pagination</a>
                                </li>
                                <li>
                                    <a href="datatables-checkbox.html">Checkbox</a>
                                </li>
                                <li>
                                    <a href="datatables-range-search.html">Range Search</a>
                                </li>
                                <li>
                                    <a href="datatables-export.html">Export</a>
                                </li>
                                <li>
                                    <a href="datatables-sticky-header.html">Sticky Header</a>
                                </li>
                                <li>
                                    <a href="datatables-clone-header.html">Clone Header</a>
                                </li>
                                <li>
                                    <a href="datatables-column-chooser.html">Column Chooser</a>
                                </li>
                            </ul>
                        </li>

                        <li class="menu nav-item">
                            <button type="button" class="nav-link group"
                                :class="{ 'active': activeDropdown === 'forms' }"
                                @click="activeDropdown === 'forms' ? activeDropdown = null : activeDropdown = 'forms'">
                                <div class="flex items-center">
                                    <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M16.5189 16.5013C16.6939 16.3648 16.8526 16.2061 17.1701 15.8886L21.1275 11.9312C21.2231 11.8356 21.1793 11.6708 21.0515 11.6264C20.5844 11.4644 19.9767 11.1601 19.4083 10.5917C18.8399 10.0233 18.5356 9.41561 18.3736 8.94849C18.3292 8.82066 18.1644 8.77687 18.0688 8.87254L14.1114 12.8299C13.7939 13.1474 13.6352 13.3061 13.4987 13.4811C13.3377 13.6876 13.1996 13.9109 13.087 14.1473C12.9915 14.3476 12.9205 14.5606 12.7786 14.9865L12.5951 15.5368L12.3034 16.4118L12.0299 17.2323C11.9601 17.4419 12.0146 17.6729 12.1708 17.8292C12.3271 17.9854 12.5581 18.0399 12.7677 17.9701L13.5882 17.6966L14.4632 17.4049L15.0135 17.2214L15.0136 17.2214C15.4394 17.0795 15.6524 17.0085 15.8527 16.913C16.0891 16.8004 16.3124 16.6623 16.5189 16.5013Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M22.3665 10.6922C23.2112 9.84754 23.2112 8.47812 22.3665 7.63348C21.5219 6.78884 20.1525 6.78884 19.3078 7.63348L19.1806 7.76071C19.0578 7.88348 19.0022 8.05496 19.0329 8.22586C19.0522 8.33336 19.0879 8.49053 19.153 8.67807C19.2831 9.05314 19.5288 9.54549 19.9917 10.0083C20.4545 10.4712 20.9469 10.7169 21.3219 10.847C21.5095 10.9121 21.6666 10.9478 21.7741 10.9671C21.945 10.9978 22.1165 10.9422 22.2393 10.8194L22.3665 10.6922Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.25 9C7.25 8.58579 7.58579 8.25 8 8.25H14.5C14.9142 8.25 15.25 8.58579 15.25 9C15.25 9.41421 14.9142 9.75 14.5 9.75H8C7.58579 9.75 7.25 9.41421 7.25 9ZM7.25 13C7.25 12.5858 7.58579 12.25 8 12.25H11C11.4142 12.25 11.75 12.5858 11.75 13C11.75 13.4142 11.4142 13.75 11 13.75H8C7.58579 13.75 7.25 13.4142 7.25 13ZM7.25 17C7.25 16.5858 7.58579 16.25 8 16.25H9.5C9.91421 16.25 10.25 16.5858 10.25 17C10.25 17.4142 9.91421 17.75 9.5 17.75H8C7.58579 17.75 7.25 17.4142 7.25 17Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Forms</span>
                                </div>
                                <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'forms' }">
                                    <svg width="16" height="16" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </button>
                            <ul x-cloak="" x-show="activeDropdown === 'forms'" x-collapse=""
                                class="sub-menu text-gray-500">
                                <li>
                                    <a href="forms-basic.html">Basic</a>
                                </li>
                                <li>
                                    <a href="forms-input-group.html">Input Group</a>
                                </li>
                                <li>
                                    <a href="forms-layouts.html">Layouts</a>
                                </li>
                                <li>
                                    <a href="forms-validation.html">Validation</a>
                                </li>
                                <li>
                                    <a href="forms-input-mask.html">Input Mask</a>
                                </li>
                                <li>
                                    <a href="forms-select2.html">Select2</a>
                                </li>
                                <li>
                                    <a href="forms-touchspin.html">TouchSpin</a>
                                </li>
                                <li>
                                    <a href="forms-checkbox-radio.html">Checkbox & Radio</a>
                                </li>
                                <li>
                                    <a href="forms-switches.html">Switches</a>
                                </li>
                                <li>
                                    <a href="forms-wizards.html">Wizards</a>
                                </li>
                                <li>
                                    <a href="forms-file-upload.html">File Upload</a>
                                </li>
                                <li>
                                    <a href="forms-quill-editor.html">Quill Editor</a>
                                </li>
                                <li>
                                    <a href="forms-markdown-editor.html">Markdown Editor</a>
                                </li>
                                <li>
                                    <a href="forms-date-picker.html">Date & Range Picker</a>
                                </li>
                                <li>
                                    <a href="forms-clipboard.html">Clipboard</a>
                                </li>
                            </ul>
                        </li>

                        <h2
                            class="-mx-4 mb-1 flex items-center bg-white-light/30 py-3 px-7 font-extrabold uppercase dark:bg-dark dark:bg-opacity-[0.08]">
                            <svg class="hidden h-5 w-4 flex-none" viewbox="0 0 24 24" stroke="currentColor"
                                stroke-width="1.5" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg>
                            <span>USER AND PAGES</span>
                        </h2>

                        <li class="menu nav-item">
                            <button type="button" class="nav-link group"
                                :class="{ 'active': activeDropdown === 'users' }"
                                @click="activeDropdown === 'users' ? activeDropdown = null : activeDropdown = 'users'">
                                <div class="flex items-center">
                                    <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <circle opacity="0.5" cx="15" cy="6" r="3"
                                            fill="currentColor"></circle>
                                        <ellipse opacity="0.5" cx="16" cy="17" rx="5"
                                            ry="3" fill="currentColor"></ellipse>
                                        <circle cx="9.00098" cy="6" r="4" fill="currentColor"></circle>
                                        <ellipse cx="9.00098" cy="17.001" rx="7" ry="4"
                                            fill="currentColor"></ellipse>
                                    </svg>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Users</span>
                                </div>
                                <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'users' }">
                                    <svg width="16" height="16" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </button>
                            <ul x-cloak="" x-show="activeDropdown === 'users'" x-collapse=""
                                class="sub-menu text-gray-500">
                                <li>
                                    <a href="users-profile.html">Profile</a>
                                </li>
                                <li>
                                    <a href="users-account-settings.html">Account Settings</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu nav-item">
                            <button type="button" class="nav-link group"
                                :class="{ 'active': activeDropdown === 'pages' }"
                                @click="activeDropdown === 'pages' ? activeDropdown = null : activeDropdown = 'pages'">
                                <div class="flex items-center">
                                    <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V10C2 6.22876 2 4.34315 3.17157 3.17157C4.34315 2 6.23869 2 10.0298 2C10.6358 2 11.1214 2 11.53 2.01666C11.5166 2.09659 11.5095 2.17813 11.5092 2.26057L11.5 5.09497C11.4999 6.19207 11.4998 7.16164 11.6049 7.94316C11.7188 8.79028 11.9803 9.63726 12.6716 10.3285C13.3628 11.0198 14.2098 11.2813 15.0569 11.3952C15.8385 11.5003 16.808 11.5002 17.9051 11.5001L18 11.5001H21.9574C22 12.0344 22 12.6901 22 13.5629V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M6 13.75C5.58579 13.75 5.25 14.0858 5.25 14.5C5.25 14.9142 5.58579 15.25 6 15.25H14C14.4142 15.25 14.75 14.9142 14.75 14.5C14.75 14.0858 14.4142 13.75 14 13.75H6Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M6 17.25C5.58579 17.25 5.25 17.5858 5.25 18C5.25 18.4142 5.58579 18.75 6 18.75H11.5C11.9142 18.75 12.25 18.4142 12.25 18C12.25 17.5858 11.9142 17.25 11.5 17.25H6Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M11.5092 2.2601L11.5 5.0945C11.4999 6.1916 11.4998 7.16117 11.6049 7.94269C11.7188 8.78981 11.9803 9.6368 12.6716 10.3281C13.3629 11.0193 14.2098 11.2808 15.057 11.3947C15.8385 11.4998 16.808 11.4997 17.9051 11.4996L21.9574 11.4996C21.9698 11.6552 21.9786 11.821 21.9848 11.9995H22C22 11.732 22 11.5983 21.9901 11.4408C21.9335 10.5463 21.5617 9.52125 21.0315 8.79853C20.9382 8.6713 20.8743 8.59493 20.7467 8.44218C19.9542 7.49359 18.911 6.31193 18 5.49953C17.1892 4.77645 16.0787 3.98536 15.1101 3.3385C14.2781 2.78275 13.862 2.50487 13.2915 2.29834C13.1403 2.24359 12.9408 2.18311 12.7846 2.14466C12.4006 2.05013 12.0268 2.01725 11.5 2.00586L11.5092 2.2601Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Pages</span>
                                </div>
                                <div class="rtl:rotate-180" :class="{ '!rotate-90': activeDropdown === 'pages' }">
                                    <svg width="16" height="16" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </button>
                            <ul x-cloak="" x-show="activeDropdown === 'pages'" x-collapse=""
                                class="sub-menu text-gray-500">
                                <li>
                                    <a href="pages-knowledge-base.html">Knowledge Base</a>
                                </li>
                                <li>
                                    <a href="pages-contact-us-boxed.html" target="_blank">Contact Us Boxed</a>
                                </li>
                                <li>
                                    <a href="pages-contact-us-cover.html" target="_blank">Contact Us Cover</a>
                                </li>
                                <li>
                                    <a href="pages-faq.html">Faq</a>
                                </li>
                                <li>
                                    <a href="pages-coming-soon-boxed.html" target="_blank">Coming Soon Boxed</a>
                                </li>
                                <li>
                                    <a href="pages-coming-soon-cover.html" target="_blank">Coming Soon Cover</a>
                                </li>
                                <li x-data="{ subActive: null }">
                                    <button type="button"
                                        class="before:h-[5px] before:w-[5px] before:rounded before:bg-gray-300 hover:bg-gray-100 ltr:before:mr-2 rtl:before:ml-2 dark:text-[#888ea8] dark:hover:bg-gray-900"
                                        @click="subActive === 'error' ? subActive = null : subActive = 'error'">
                                        Error
                                        <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180"
                                            :class="{ '!rotate-90': subActive === 'error' }">
                                            <svg width="16" height="16" viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5"
                                                    d="M6.25 19C6.25 19.3139 6.44543 19.5946 6.73979 19.7035C7.03415 19.8123 7.36519 19.7264 7.56944 19.4881L13.5694 12.4881C13.8102 12.2073 13.8102 11.7928 13.5694 11.5119L7.56944 4.51194C7.36519 4.27364 7.03415 4.18773 6.73979 4.29662C6.44543 4.40551 6.25 4.68618 6.25 5.00004L6.25 19Z"
                                                    fill="currentColor"></path>
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M10.5119 19.5695C10.1974 19.2999 10.161 18.8264 10.4306 18.5119L16.0122 12L10.4306 5.48811C10.161 5.17361 10.1974 4.70014 10.5119 4.43057C10.8264 4.161 11.2999 4.19743 11.5695 4.51192L17.5695 11.5119C17.8102 11.7928 17.8102 12.2072 17.5695 12.4881L11.5695 19.4881C11.2999 19.8026 10.8264 19.839 10.5119 19.5695Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </div>
                                    </button>
                                    <ul class="sub-menu text-gray-500 ltr:ml-2 rtl:mr-2"
                                        x-show="subActive === 'error'" x-collapse="">
                                        <li>
                                            <a href="pages-error404.html" target="_blank">404</a>
                                        </li>
                                        <li>
                                            <a href="pages-error500.html" target="_blank">500</a>
                                        </li>
                                        <li>
                                            <a href="pages-error503.html" target="_blank">503</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="pages-maintenence.html" target="_blank">Maintanence</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu nav-item">
                            <button type="button" class="nav-link group"
                                :class="{ 'active': activeDropdown === 'authentication' }"
                                @click="activeDropdown === 'authentication' ? activeDropdown = null : activeDropdown = 'authentication'">
                                <div class="flex items-center">
                                    <svg class="shrink-0 group-hover:!text-primary" width="20" height="20"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path opacity="0.5"
                                            d="M2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M8 17C8.55228 17 9 16.5523 9 16C9 15.4477 8.55228 15 8 15C7.44772 15 7 15.4477 7 16C7 16.5523 7.44772 17 8 17Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M12 17C12.5523 17 13 16.5523 13 16C13 15.4477 12.5523 15 12 15C11.4477 15 11 15.4477 11 16C11 16.5523 11.4477 17 12 17Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M17 16C17 16.5523 16.5523 17 16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M6.75 8C6.75 5.10051 9.10051 2.75 12 2.75C14.8995 2.75 17.25 5.10051 17.25 8V10.0036C17.8174 10.0089 18.3135 10.022 18.75 10.0546V8C18.75 4.27208 15.7279 1.25 12 1.25C8.27208 1.25 5.25 4.27208 5.25 8V10.0546C5.68651 10.022 6.18264 10.0089 6.75 10.0036V8Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span
                                        class="text-black ltr:pl-3 rtl:pr-3 dark:text-[#506690] dark:group-hover:text-white-dark">Authentication</span>
                                </div>
                                <div class="rtl:rotate-180"
                                    :class="{ '!rotate-90': activeDropdown === 'authentication' }">
                                    <svg width="16" height="16" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </button>
                            <ul x-cloak="" x-show="activeDropdown === 'authentication'" x-collapse=""
                                class="sub-menu text-gray-500">
                                <li>
                                    <a href="auth-boxed-signin.html" target="_blank">Login Boxed</a>
                                </li>
                                <li>
                                    <a href="auth-boxed-signup.html" target="_blank">Register Boxed</a>
                                </li>
                                <li>
                                    <a href="auth-boxed-lockscreen.html" target="_blank">Unlock Boxed</a>
                                </li>
                                <li>
                                    <a href="auth-boxed-password-reset.html" target="_blank">Recover ID Boxed</a>
                                </li>
                                <li>
                                    <a href="auth-cover-login.html" target="_blank">Login Cover</a>
                                </li>
                                <li>
                                    <a href="auth-cover-register.html" target="_blank">Register Cover</a>
                                </li>
                                <li>
                                    <a href="auth-cover-lockscreen.html" target="_blank">Unlock Cover</a>
                                </li>
                                <li>
                                    <a href="auth-cover-password-reset.html" target="_blank">Recover ID Cover</a>
                                </li>
                            </ul>
                        </li>


                    </ul>
                </div>
            </nav>
        </div>
        <!-- end sidebar section -->

        <div class="main-content flex flex-col min-h-screen">
            <!-- start header section -->
            <header class="z-40" :class="{ 'dark': $store.app.semidark && $store.app.menu === 'horizontal' }">
                <div class="shadow-sm">
                    <div class="relative flex w-full items-center bg-white px-5 py-2.5 dark:bg-[#0e1726]">
                        <div class="horizontal-logo flex items-center justify-between ltr:mr-2 rtl:ml-2 lg:hidden">
                            <a href="index.html" class="main-logo flex shrink-0 items-center">
                                <img class="inline w-8 ltr:-ml-1 rtl:-mr-1" src="assets/images/logo.png"
                                    alt="image">
                                <span
                                    class="hidden align-middle text-2xl font-semibold transition-all duration-300 ltr:ml-1.5 rtl:mr-1.5 dark:text-white-light md:inline">StarCode
                                    Kh</span>
                            </a>

                            <a href="javascript:;"
                                class="collapse-icon flex flex-none rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary ltr:ml-2 rtl:mr-2 dark:bg-dark/40 dark:text-[#d0d2d6] dark:hover:bg-dark/60 dark:hover:text-primary lg:hidden"
                                @click="$store.app.toggleSidebar()">
                                <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round"></path>
                                    <path opacity="0.5" d="M20 12L4 12" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round"></path>
                                    <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5"
                                        stroke-linecap="round"></path>
                                </svg>
                            </a>
                        </div>
                        <div class="hidden ltr:mr-2 rtl:ml-2 sm:block">
                            <ul class="flex items-center space-x-2 rtl:space-x-reverse dark:text-[#d0d2d6]">
                                <li>
                                    <a href="apps-calendar.html"
                                        class="block rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60">
                                        <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V12Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                            <path opacity="0.5" d="M7 4V2.5" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round"></path>
                                            <path opacity="0.5" d="M17 4V2.5" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round"></path>
                                            <path opacity="0.5" d="M2 9H22" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="apps-todolist.html"
                                        class="block rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60">
                                        <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path opacity="0.5"
                                                d="M22 10.5V12C22 16.714 22 19.0711 20.5355 20.5355C19.0711 22 16.714 22 12 22C7.28595 22 4.92893 22 3.46447 20.5355C2 19.0711 2 16.714 2 12C2 7.28595 2 4.92893 3.46447 3.46447C4.92893 2 7.28595 2 12 2H13.5"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                            </path>
                                            <path
                                                d="M17.3009 2.80624L16.652 3.45506L10.6872 9.41993C10.2832 9.82394 10.0812 10.0259 9.90743 10.2487C9.70249 10.5114 9.52679 10.7957 9.38344 11.0965C9.26191 11.3515 9.17157 11.6225 8.99089 12.1646L8.41242 13.9L8.03811 15.0229C7.9492 15.2897 8.01862 15.5837 8.21744 15.7826C8.41626 15.9814 8.71035 16.0508 8.97709 15.9619L10.1 15.5876L11.8354 15.0091C12.3775 14.8284 12.6485 14.7381 12.9035 14.6166C13.2043 14.4732 13.4886 14.2975 13.7513 14.0926C13.9741 13.9188 14.1761 13.7168 14.5801 13.3128L20.5449 7.34795L21.1938 6.69914C22.2687 5.62415 22.2687 3.88124 21.1938 2.80624C20.1188 1.73125 18.3759 1.73125 17.3009 2.80624Z"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                            <path opacity="0.5"
                                                d="M16.6522 3.45508C16.6522 3.45508 16.7333 4.83381 17.9499 6.05034C19.1664 7.26687 20.5451 7.34797 20.5451 7.34797M10.1002 15.5876L8.4126 13.9"
                                                stroke="currentColor" stroke-width="1.5"></path>
                                        </svg>
                                    </a>
                                </li>
                                <li>
                                    <a href="apps-chat.html"
                                        class="block rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60">
                                        <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <circle r="3" transform="matrix(-1 0 0 1 19 5)" stroke="currentColor"
                                                stroke-width="1.5"></circle>
                                            <path opacity="0.5"
                                                d="M14 2.20004C13.3538 2.06886 12.6849 2 12 2C6.47715 2 2 6.47715 2 12C2 13.5997 2.37562 15.1116 3.04346 16.4525C3.22094 16.8088 3.28001 17.2161 3.17712 17.6006L2.58151 19.8267C2.32295 20.793 3.20701 21.677 4.17335 21.4185L6.39939 20.8229C6.78393 20.72 7.19121 20.7791 7.54753 20.9565C8.88837 21.6244 10.4003 22 12 22C17.5228 22 22 17.5228 22 12C22 11.3151 21.9311 10.6462 21.8 10"
                                                stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                            </path>
                                        </svg>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div x-data="header"
                            class="flex items-center space-x-1.5 ltr:ml-auto rtl:mr-auto rtl:space-x-reverse dark:text-[#d0d2d6] sm:flex-1 ltr:sm:ml-0 sm:rtl:mr-0 lg:space-x-2">
                            <div class="sm:ltr:mr-auto sm:rtl:ml-auto" x-data="{ search: false }"
                                @click.outside="search = false">
                                <form
                                    class="absolute inset-x-0 top-1/2 z-10 mx-4 hidden -translate-y-1/2 sm:relative sm:top-0 sm:mx-0 sm:block sm:translate-y-0"
                                    :class="{ '!block': search }" @submit.prevent="search = false">
                                    <div class="relative">
                                        <input type="text"
                                            class="peer form-input bg-gray-100 placeholder:tracking-widest ltr:pl-9 ltr:pr-9 rtl:pr-9 rtl:pl-9 sm:bg-transparent ltr:sm:pr-4 rtl:sm:pl-4"
                                            placeholder="Search...">
                                        <button type="button"
                                            class="absolute inset-0 h-9 w-9 appearance-none peer-focus:text-primary ltr:right-auto rtl:left-auto">
                                            <svg class="mx-auto" width="16" height="16"
                                                viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="11.5" cy="11.5" r="9.5"
                                                    stroke="currentColor" stroke-width="1.5" opacity="0.5">
                                                </circle>
                                                <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round"></path>
                                            </svg>
                                        </button>
                                        <button type="button"
                                            class="absolute top-1/2 block -translate-y-1/2 hover:opacity-80 ltr:right-2 rtl:left-2 sm:hidden"
                                            @click="search = false">
                                            <svg width="20" height="20" viewbox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <circle opacity="0.5" cx="12" cy="12" r="10"
                                                    stroke="currentColor" stroke-width="1.5"></circle>
                                                <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5"
                                                    stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round"></path>
                                            </svg>
                                        </button>
                                    </div>
                                </form>
                                <button type="button"
                                    class="search_btn rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 dark:bg-dark/40 dark:hover:bg-dark/60 sm:hidden"
                                    @click="search = ! search">
                                    <svg class="mx-auto h-4.5 w-4.5 dark:text-[#d0d2d6]" width="20"
                                        height="20" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor"
                                            stroke-width="1.5" opacity="0.5"></circle>
                                        <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                    </svg>
                                </button>
                            </div>
                            <div>
                                <a href="javascript:;" x-cloak="" x-show="$store.app.theme === 'light'"
                                    href="javascript:;"
                                    class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                    @click="$store.app.toggleTheme('dark')">
                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="12" cy="12" r="5" stroke="currentColor"
                                            stroke-width="1.5"></circle>
                                        <path d="M12 2V4" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path d="M12 20V22" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path d="M4 12L2 12" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path d="M22 12L20 12" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path opacity="0.5" d="M19.7778 4.22266L17.5558 6.25424"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                        </path>
                                        <path opacity="0.5" d="M4.22217 4.22266L6.44418 6.25424"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                        </path>
                                        <path opacity="0.5" d="M6.44434 17.5557L4.22211 19.7779"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                        </path>
                                        <path opacity="0.5" d="M19.7778 19.7773L17.5558 17.5551"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                        </path>
                                    </svg>
                                </a>
                                <a href="javascript:;" x-cloak="" x-show="$store.app.theme === 'dark'"
                                    href="javascript:;"
                                    class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                    @click="$store.app.toggleTheme('system')">
                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M21.0672 11.8568L20.4253 11.469L21.0672 11.8568ZM12.1432 2.93276L11.7553 2.29085V2.29085L12.1432 2.93276ZM21.25 12C21.25 17.1086 17.1086 21.25 12 21.25V22.75C17.9371 22.75 22.75 17.9371 22.75 12H21.25ZM12 21.25C6.89137 21.25 2.75 17.1086 2.75 12H1.25C1.25 17.9371 6.06294 22.75 12 22.75V21.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75V1.25C6.06294 1.25 1.25 6.06294 1.25 12H2.75ZM15.5 14.25C12.3244 14.25 9.75 11.6756 9.75 8.5H8.25C8.25 12.5041 11.4959 15.75 15.5 15.75V14.25ZM20.4253 11.469C19.4172 13.1373 17.5882 14.25 15.5 14.25V15.75C18.1349 15.75 20.4407 14.3439 21.7092 12.2447L20.4253 11.469ZM9.75 8.5C9.75 6.41182 10.8627 4.5828 12.531 3.57467L11.7553 2.29085C9.65609 3.5593 8.25 5.86509 8.25 8.5H9.75ZM12 2.75C11.9115 2.75 11.8077 2.71008 11.7324 2.63168C11.6686 2.56527 11.6538 2.50244 11.6503 2.47703C11.6461 2.44587 11.6482 2.35557 11.7553 2.29085L12.531 3.57467C13.0342 3.27065 13.196 2.71398 13.1368 2.27627C13.0754 1.82126 12.7166 1.25 12 1.25V2.75ZM21.7092 12.2447C21.6444 12.3518 21.5541 12.3539 21.523 12.3497C21.4976 12.3462 21.4347 12.3314 21.3683 12.2676C21.2899 12.1923 21.25 12.0885 21.25 12H22.75C22.75 11.2834 22.1787 10.9246 21.7237 10.8632C21.286 10.804 20.7293 10.9658 20.4253 11.469L21.7092 12.2447Z"
                                            fill="currentColor"></path>
                                    </svg>
                                </a>
                                <a href="javascript:;" x-cloak="" x-show="$store.app.theme === 'system'"
                                    href="javascript:;"
                                    class="flex items-center rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                    @click="$store.app.toggleTheme('light')">
                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M3 9C3 6.17157 3 4.75736 3.87868 3.87868C4.75736 3 6.17157 3 9 3H15C17.8284 3 19.2426 3 20.1213 3.87868C21 4.75736 21 6.17157 21 9V14C21 15.8856 21 16.8284 20.4142 17.4142C19.8284 18 18.8856 18 17 18H7C5.11438 18 4.17157 18 3.58579 17.4142C3 16.8284 3 15.8856 3 14V9Z"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                        <path opacity="0.5" d="M22 21H2" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                        <path opacity="0.5" d="M15 15H9" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                    </svg>
                                </a>
                            </div>

                            <div class="dropdown shrink-0" x-data="dropdown" @click.outside="open = false">
                                <a href="javascript:;"
                                    class="block rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                    @click="toggle">
                                    <img :src="`assets/images/flags/${$store.app.locale.toUpperCase()}.svg`"
                                        alt="image" class="h-5 w-5 rounded-full object-cover">
                                </a>
                                <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms=""
                                    class="top-11 grid w-[280px] grid-cols-2 gap-y-2 !px-2 font-semibold text-dark ltr:-right-14 rtl:-left-14 dark:text-white-dark dark:text-white-light/90 sm:ltr:-right-2 sm:rtl:-left-2">
                                    <template x-for="item in languages">
                                        <li>
                                            <a href="javascript:;" class="hover:text-primary"
                                                @click="$store.app.toggleLocale(item.value),toggle()"
                                                :class="{ 'bg-primary/10 text-primary': $store.app.locale == item.value }">
                                                <img class="h-5 w-5 rounded-full object-cover"
                                                    :src="`assets/images/flags/${item.value.toUpperCase()}.svg`"
                                                    alt="image">
                                                <span class="ltr:ml-3 rtl:mr-3" x-text="item.key"></span>
                                            </a>
                                        </li>
                                    </template>
                                </ul>
                            </div>

                            <div class="dropdown" x-data="dropdown" @click.outside="open = false">
                                <a href="javascript:;"
                                    class="block rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                    @click="toggle">
                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M22 10C22.0185 10.7271 22 11.0542 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H13"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                        </path>
                                        <path
                                            d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                        </path>
                                        <circle cx="19" cy="5" r="3" stroke="currentColor"
                                            stroke-width="1.5"></circle>
                                    </svg>
                                </a>
                                <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms=""
                                    class="top-11 w-[300px] !py-0 text-xs text-dark ltr:-right-16 rtl:-left-16 dark:text-white-dark sm:w-[375px] sm:ltr:-right-2 sm:rtl:-left-2">
                                    <li class="mb-5">
                                        <div class="relative overflow-hidden rounded-t-md !p-5 text-white">
                                            <div
                                                class="absolute inset-0 h-full w-full bg-[url('../images/menu-heade.jpg')] bg-cover bg-center bg-no-repeat">
                                            </div>
                                            <h4 class="relative z-10 text-lg font-semibold">Messages</h4>
                                        </div>
                                    </li>
                                    <template x-for="msg in messages">
                                        <li>
                                            <div class="flex items-center px-5 py-3" @click.self="toggle">
                                                <div x-html="msg.image"></div>
                                                <span class="px-3 dark:text-gray-500">
                                                    <div class="text-sm font-semibold dark:text-white-light/90"
                                                        x-text="msg.title"></div>
                                                    <div x-text="msg.message"></div>
                                                </span>
                                                <span
                                                    class="whitespace-pre rounded bg-white-dark/20 px-1 font-semibold text-dark/60 ltr:ml-auto ltr:mr-2 rtl:mr-auto rtl:ml-2 dark:text-white-dark"
                                                    x-text="msg.time"></span>
                                                <button type="button" class="text-neutral-300 hover:text-danger"
                                                    @click="removeMessage(msg.id)">
                                                    <svg width="20" height="20" viewbox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <circle opacity="0.5" cx="12" cy="12"
                                                            r="10" stroke="currentColor" stroke-width="1.5">
                                                        </circle>
                                                        <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                        </li>
                                    </template>
                                    <template x-if="messages.length">
                                        <li class="mt-5 border-t border-white-light text-center dark:border-white/10">
                                            <div class="group flex cursor-pointer items-center justify-center px-4 py-4 font-semibold text-primary dark:text-gray-400"
                                                @click="toggle">
                                                <span class="group-hover:underline ltr:mr-1 rtl:ml-1">VIEW ALL
                                                    ACTIVITIES</span>
                                                <svg class="h-4 w-4 transition duration-300 group-hover:translate-x-1 ltr:ml-1 rtl:mr-1"
                                                    viewbox="0 0 24 24" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M4 12H20M20 12L14 6M20 12L14 18" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"
                                                        stroke-linejoin="round"></path>
                                                </svg>
                                            </div>
                                        </li>
                                    </template>
                                    <template x-if="!messages.length">
                                        <li class="mb-5">
                                            <div
                                                class="!grid min-h-[200px] place-content-center text-lg hover:!bg-transparent">
                                                <div
                                                    class="mx-auto mb-4 rounded-full text-primary ring-4 ring-primary/30">
                                                    <svg width="40" height="40" viewbox="0 0 20 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.5"
                                                            d="M20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M10 4.25C10.4142 4.25 10.75 4.58579 10.75 5V11C10.75 11.4142 10.4142 11.75 10 11.75C9.58579 11.75 9.25 11.4142 9.25 11V5C9.25 4.58579 9.58579 4.25 10 4.25Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </div>
                                                No data available.
                                            </div>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                            <div class="dropdown" x-data="dropdown" @click.outside="open = false">
                                <a href="javascript:;"
                                    class="relative block rounded-full bg-white-light/40 p-2 hover:bg-white-light/90 hover:text-primary dark:bg-dark/40 dark:hover:bg-dark/60"
                                    @click="toggle">
                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                        <path
                                            d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                        </path>
                                        <path d="M12 6V10" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                    </svg>

                                    <span class="absolute top-0 flex h-3 w-3 ltr:right-0 rtl:left-0">
                                        <span
                                            class="absolute -top-[3px] inline-flex h-full w-full animate-ping rounded-full bg-success/50 opacity-75 ltr:-left-[3px] rtl:-right-[3px]"></span>
                                        <span
                                            class="relative inline-flex h-[6px] w-[6px] rounded-full bg-success"></span>
                                    </span>
                                </a>
                                <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms=""
                                    class="top-11 w-[300px] divide-y !py-0 text-dark ltr:-right-2 rtl:-left-2 dark:divide-white/10 dark:text-white-dark sm:w-[350px]">
                                    <li>
                                        <div
                                            class="flex items-center justify-between px-4 py-2 font-semibold hover:!bg-transparent">
                                            <h4 class="text-lg">Notification</h4>
                                            <template x-if="notifications.length">
                                                <span class="badge bg-primary/80"
                                                    x-text="notifications.length + 'New'"></span>
                                            </template>
                                        </div>
                                    </li>
                                    <template x-for="notification in notifications">
                                        <li class="dark:text-white-light/90">
                                            <div class="group flex items-center px-4 py-2" @click.self="toggle">
                                                <div class="grid place-content-center rounded">
                                                    <div class="relative h-12 w-12">
                                                        <img class="h-12 w-12 rounded-full object-cover"
                                                            :src="`assets/images/${notification.profile}`"
                                                            alt="image">
                                                        <span
                                                            class="absolute right-[6px] bottom-0 block h-2 w-2 rounded-full bg-success"></span>
                                                    </div>
                                                </div>
                                                <div class="flex flex-auto ltr:pl-3 rtl:pr-3">
                                                    <div class="ltr:pr-3 rtl:pl-3">
                                                        <h6 x-html="notification.message"></h6>
                                                        <span class="block text-xs font-normal dark:text-gray-500"
                                                            x-text="notification.time"></span>
                                                    </div>
                                                    <button type="button"
                                                        class="text-neutral-300 opacity-0 hover:text-danger group-hover:opacity-100 ltr:ml-auto rtl:mr-auto"
                                                        @click="removeNotification(notification.id)">
                                                        <svg width="20" height="20" viewbox="0 0 24 24"
                                                            fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <circle opacity="0.5" cx="12" cy="12"
                                                                r="10" stroke="currentColor" stroke-width="1.5">
                                                            </circle>
                                                            <path d="M14.5 9.50002L9.5 14.5M9.49998 9.5L14.5 14.5"
                                                                stroke="currentColor" stroke-width="1.5"
                                                                stroke-linecap="round"></path>
                                                        </svg>
                                                    </button>
                                                </div>
                                            </div>
                                        </li>
                                    </template>
                                    <template x-if="notifications.length">
                                        <li>
                                            <div class="p-4">
                                                <button class="btn btn-primary btn-small block w-full"
                                                    @click="toggle">Read All Notifications</button>
                                            </div>
                                        </li>
                                    </template>
                                    <template x-if="!notifications.length">
                                        <li>
                                            <div
                                                class="!grid min-h-[200px] place-content-center text-lg hover:!bg-transparent">
                                                <div
                                                    class="mx-auto mb-4 rounded-full text-primary ring-4 ring-primary/30">
                                                    <svg width="40" height="40" viewbox="0 0 20 20"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path opacity="0.5"
                                                            d="M20 10C20 4.47715 15.5228 0 10 0C4.47715 0 0 4.47715 0 10C0 15.5228 4.47715 20 10 20C15.5228 20 20 15.5228 20 10Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M10 4.25C10.4142 4.25 10.75 4.58579 10.75 5V11C10.75 11.4142 10.4142 11.75 10 11.75C9.58579 11.75 9.25 11.4142 9.25 11V5C9.25 4.58579 9.58579 4.25 10 4.25Z"
                                                            fill="currentColor"></path>
                                                        <path
                                                            d="M10 15C10.5523 15 11 14.5523 11 14C11 13.4477 10.5523 13 10 13C9.44772 13 9 13.4477 9 14C9 14.5523 9.44772 15 10 15Z"
                                                            fill="currentColor"></path>
                                                    </svg>
                                                </div>
                                                No data available.
                                            </div>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                            <div class="dropdown flex-shrink-0" x-data="dropdown"
                                @click.outside="open = false">
                                <a href="javascript:;" class="group relative" @click="toggle()">
                                    <span><img
                                            class="h-9 w-9 rounded-full object-cover saturate-50 group-hover:saturate-100"
                                            src="assets/images/user-profile.jpeg" alt="image"></span>
                                </a>
                                <ul x-cloak="" x-show="open" x-transition="" x-transition.duration.300ms=""
                                    class="top-11 w-[230px] !py-0 font-semibold text-dark ltr:right-0 rtl:left-0 dark:text-white-dark dark:text-white-light/90">
                                    <li>
                                        <div class="flex items-center px-4 py-4">
                                            <div class="flex-none">
                                                <img class="h-10 w-10 rounded-md object-cover"
                                                    src="assets/images/user-profile.jpeg" alt="image">
                                            </div>
                                            <div class="truncate ltr:pl-4 rtl:pr-4">
                                                <h4 class="text-base">
                                                    StarCode Kh<span
                                                        class="rounded bg-success-light px-1 text-xs text-success ltr:ml-2 rtl:ml-2">Pro</span>
                                                </h4>
                                                <a class="text-black/60 hover:text-primary dark:text-dark-light/60 dark:hover:text-white"
                                                    href="javascript:;">starcodekh@gmail.com</a>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <a href="users-profile.html" class="dark:hover:text-white"
                                            @click="toggle">
                                            <svg class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2" width="18"
                                                height="18" viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <circle cx="12" cy="6" r="4" stroke="currentColor"
                                                    stroke-width="1.5"></circle>
                                                <path opacity="0.5"
                                                    d="M20 17.5C20 19.9853 20 22 12 22C4 22 4 19.9853 4 17.5C4 15.0147 7.58172 13 12 13C16.4183 13 20 15.0147 20 17.5Z"
                                                    stroke="currentColor" stroke-width="1.5"></path>
                                            </svg>
                                            Profile</a>
                                    </li>
                                    <li>
                                        <a href="apps-mailbox.html" class="dark:hover:text-white" @click="toggle">
                                            <svg class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2" width="18"
                                                height="18" viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5"
                                                    d="M2 12C2 8.22876 2 6.34315 3.17157 5.17157C4.34315 4 6.22876 4 10 4H14C17.7712 4 19.6569 4 20.8284 5.17157C22 6.34315 22 8.22876 22 12C22 15.7712 22 17.6569 20.8284 18.8284C19.6569 20 17.7712 20 14 20H10C6.22876 20 4.34315 20 3.17157 18.8284C2 17.6569 2 15.7712 2 12Z"
                                                    stroke="currentColor" stroke-width="1.5"></path>
                                                <path
                                                    d="M6 8L8.1589 9.79908C9.99553 11.3296 10.9139 12.0949 12 12.0949C13.0861 12.0949 14.0045 11.3296 15.8411 9.79908L18 8"
                                                    stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round"></path>
                                            </svg>
                                            Inbox</a>
                                    </li>
                                    <li>
                                        <a href="auth-boxed-lockscreen.html" class="dark:hover:text-white"
                                            @click="toggle">
                                            <svg class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2" width="18"
                                                height="18" viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M2 16C2 13.1716 2 11.7574 2.87868 10.8787C3.75736 10 5.17157 10 8 10H16C18.8284 10 20.2426 10 21.1213 10.8787C22 11.7574 22 13.1716 22 16C22 18.8284 22 20.2426 21.1213 21.1213C20.2426 22 18.8284 22 16 22H8C5.17157 22 3.75736 22 2.87868 21.1213C2 20.2426 2 18.8284 2 16Z"
                                                    stroke="currentColor" stroke-width="1.5"></path>
                                                <path opacity="0.5"
                                                    d="M6 10V8C6 4.68629 8.68629 2 12 2C15.3137 2 18 4.68629 18 8V10"
                                                    stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round"></path>
                                                <g opacity="0.5">
                                                    <path
                                                        d="M9 16C9 16.5523 8.55228 17 8 17C7.44772 17 7 16.5523 7 16C7 15.4477 7.44772 15 8 15C8.55228 15 9 15.4477 9 16Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M13 16C13 16.5523 12.5523 17 12 17C11.4477 17 11 16.5523 11 16C11 15.4477 11.4477 15 12 15C12.5523 15 13 15.4477 13 16Z"
                                                        fill="currentColor"></path>
                                                    <path
                                                        d="M17 16C17 16.5523 16.5523 17 16 17C15.4477 17 15 16.5523 15 16C15 15.4477 15.4477 15 16 15C16.5523 15 17 15.4477 17 16Z"
                                                        fill="currentColor"></path>
                                                </g>
                                            </svg>
                                            Lock Screen</a>
                                    </li>
                                    <li class="border-t border-white-light dark:border-white-light/10">
                                        <a href="auth-boxed-signin.html" class="!py-3 text-danger"
                                            @click="toggle">
                                            <svg class="h-4.5 w-4.5 rotate-90 ltr:mr-2 rtl:ml-2" width="18"
                                                height="18" viewbox="0 0 24 24" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path opacity="0.5"
                                                    d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195"
                                                    stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round"></path>
                                                <path d="M12 15L12 2M12 2L15 5.5M12 2L9 5.5" stroke="currentColor"
                                                    stroke-width="1.5" stroke-linecap="round"
                                                    stroke-linejoin="round"></path>
                                            </svg>
                                            Sign Out
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <!-- horizontal menu -->
                    <ul
                        class="horizontal-menu hidden border-t border-[#ebedf2] bg-white py-1.5 px-6 font-semibold text-black rtl:space-x-reverse dark:border-[#191e3a] dark:bg-[#0e1726] dark:text-white-dark lg:space-x-1.5 xl:space-x-8">
                        <li class="menu nav-item relative">
                            <a href="javascript:;" class="nav-link">
                                <div class="flex items-center">
                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                        <path opacity="0.5"
                                            d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M9 17.25C8.58579 17.25 8.25 17.5858 8.25 18C8.25 18.4142 8.58579 18.75 9 18.75H15C15.4142 18.75 15.75 18.4142 15.75 18C15.75 17.5858 15.4142 17.25 15 17.25H9Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span class="px-1">Dashboard</span>
                                </div>
                                <div class="right_arrow">
                                    <svg class="h-4 w-4 rotate-90" width="16" height="16"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="index.html">Sales</a>
                                </li>
                                <li>
                                    <a href="analytics.html">Analytics</a>
                                </li>
                                <li>
                                    <a href="finance.html">Finance</a>
                                </li>
                                <li>
                                    <a href="crypto.html">Crypto</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu nav-item relative">
                            <a href="javascript:;" class="nav-link active">
                                <div class="flex items-center">
                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                        <g opacity="0.5">
                                            <path
                                                d="M14 2.75C15.9068 2.75 17.2615 2.75159 18.2892 2.88976C19.2952 3.02503 19.8749 3.27869 20.2981 3.7019C20.7213 4.12511 20.975 4.70476 21.1102 5.71085C21.2484 6.73851 21.25 8.09318 21.25 10C21.25 10.4142 21.5858 10.75 22 10.75C22.4142 10.75 22.75 10.4142 22.75 10V9.94359C22.75 8.10583 22.75 6.65019 22.5969 5.51098C22.4392 4.33856 22.1071 3.38961 21.3588 2.64124C20.6104 1.89288 19.6614 1.56076 18.489 1.40314C17.3498 1.24997 15.8942 1.24998 14.0564 1.25H14C13.5858 1.25 13.25 1.58579 13.25 2C13.25 2.41421 13.5858 2.75 14 2.75Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M9.94358 1.25H10C10.4142 1.25 10.75 1.58579 10.75 2C10.75 2.41421 10.4142 2.75 10 2.75C8.09318 2.75 6.73851 2.75159 5.71085 2.88976C4.70476 3.02503 4.12511 3.27869 3.7019 3.7019C3.27869 4.12511 3.02503 4.70476 2.88976 5.71085C2.75159 6.73851 2.75 8.09318 2.75 10C2.75 10.4142 2.41421 10.75 2 10.75C1.58579 10.75 1.25 10.4142 1.25 10V9.94358C1.24998 8.10583 1.24997 6.65019 1.40314 5.51098C1.56076 4.33856 1.89288 3.38961 2.64124 2.64124C3.38961 1.89288 4.33856 1.56076 5.51098 1.40314C6.65019 1.24997 8.10583 1.24998 9.94358 1.25Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M22 13.25C22.4142 13.25 22.75 13.5858 22.75 14V14.0564C22.75 15.8942 22.75 17.3498 22.5969 18.489C22.4392 19.6614 22.1071 20.6104 21.3588 21.3588C20.6104 22.1071 19.6614 22.4392 18.489 22.5969C17.3498 22.75 15.8942 22.75 14.0564 22.75H14C13.5858 22.75 13.25 22.4142 13.25 22C13.25 21.5858 13.5858 21.25 14 21.25C15.9068 21.25 17.2615 21.2484 18.2892 21.1102C19.2952 20.975 19.8749 20.7213 20.2981 20.2981C20.7213 19.8749 20.975 19.2952 21.1102 18.2892C21.2484 17.2615 21.25 15.9068 21.25 14C21.25 13.5858 21.5858 13.25 22 13.25Z"
                                                fill="currentColor"></path>
                                            <path
                                                d="M2.75 14C2.75 13.5858 2.41421 13.25 2 13.25C1.58579 13.25 1.25 13.5858 1.25 14V14.0564C1.24998 15.8942 1.24997 17.3498 1.40314 18.489C1.56076 19.6614 1.89288 20.6104 2.64124 21.3588C3.38961 22.1071 4.33856 22.4392 5.51098 22.5969C6.65019 22.75 8.10583 22.75 9.94359 22.75H10C10.4142 22.75 10.75 22.4142 10.75 22C10.75 21.5858 10.4142 21.25 10 21.25C8.09318 21.25 6.73851 21.2484 5.71085 21.1102C4.70476 20.975 4.12511 20.7213 3.7019 20.2981C3.27869 19.8749 3.02503 19.2952 2.88976 18.2892C2.75159 17.2615 2.75 15.9068 2.75 14Z"
                                                fill="currentColor"></path>
                                        </g>
                                        <path
                                            d="M5.52721 5.52721C5 6.05442 5 6.90294 5 8.6C5 9.73137 5 10.2971 5.35147 10.6485C5.70294 11 6.26863 11 7.4 11H8.6C9.73137 11 10.2971 11 10.6485 10.6485C11 10.2971 11 9.73137 11 8.6V7.4C11 6.26863 11 5.70294 10.6485 5.35147C10.2971 5 9.73137 5 8.6 5C6.90294 5 6.05442 5 5.52721 5.52721Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M5.52721 18.4728C5 17.9456 5 17.0971 5 15.4C5 14.2686 5 13.7029 5.35147 13.3515C5.70294 13 6.26863 13 7.4 13H8.6C9.73137 13 10.2971 13 10.6485 13.3515C11 13.7029 11 14.2686 11 15.4V16.6C11 17.7314 11 18.2971 10.6485 18.6485C10.2971 19 9.73138 19 8.60002 19C6.90298 19 6.05441 19 5.52721 18.4728Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M13 7.4C13 6.26863 13 5.70294 13.3515 5.35147C13.7029 5 14.2686 5 15.4 5C17.0971 5 17.9456 5 18.4728 5.52721C19 6.05442 19 6.90294 19 8.6C19 9.73137 19 10.2971 18.6485 10.6485C18.2971 11 17.7314 11 16.6 11H15.4C14.2686 11 13.7029 11 13.3515 10.6485C13 10.2971 13 9.73137 13 8.6V7.4Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M13.3515 18.6485C13 18.2971 13 17.7314 13 16.6V15.4C13 14.2686 13 13.7029 13.3515 13.3515C13.7029 13 14.2686 13 15.4 13H16.6C17.7314 13 18.2971 13 18.6485 13.3515C19 13.7029 19 14.2686 19 15.4C19 17.097 19 17.9456 18.4728 18.4728C17.9456 19 17.0971 19 15.4 19C14.2687 19 13.7029 19 13.3515 18.6485Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span class="px-1">Apps</span>
                                </div>
                                <div class="right_arrow">
                                    <svg class="h-4 w-4 rotate-90" width="16" height="16"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="apps-chat.html" class="active">Chat</a>
                                </li>
                                <li>
                                    <a href="apps-mailbox.html">Mailbox</a>
                                </li>
                                <li>
                                    <a href="apps-todolist.html">Todo List</a>
                                </li>
                                <li>
                                    <a href="apps-notes.html">Notes</a>
                                </li>
                                <li>
                                    <a href="apps-scrumboard.html">Scrumboard</a>
                                </li>
                                <li>
                                    <a href="apps-contacts.html">Contacts</a>
                                </li>
                                <li class="relative">
                                    <a href="javascript:;">Invoice
                                        <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                            <svg width="16" height="16" viewbox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <ul
                                        class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark">
                                        <li>
                                            <a href="apps-invoice-list.html">List</a>
                                        </li>
                                        <li>
                                            <a href="apps-invoice-preview.html">Preview</a>
                                        </li>
                                        <li>
                                            <a href="apps-invoice-add.html">Add</a>
                                        </li>
                                        <li>
                                            <a href="apps-invoice-edit.html">Edit</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="apps-calendar.html">Calendar</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu nav-item relative">
                            <a href="javascript:;" class="nav-link">
                                <div class="flex items-center">
                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                        <path
                                            d="M8.42229 20.6181C10.1779 21.5395 11.0557 22.0001 12 22.0001V12.0001L2.63802 7.07275C2.62423 7.09491 2.6107 7.11727 2.5974 7.13986C2 8.15436 2 9.41678 2 11.9416V12.0586C2 14.5834 2 15.8459 2.5974 16.8604C3.19479 17.8749 4.27063 18.4395 6.42229 19.5686L8.42229 20.6181Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.7"
                                            d="M17.5774 4.43152L15.5774 3.38197C13.8218 2.46066 12.944 2 11.9997 2C11.0554 2 10.1776 2.46066 8.42197 3.38197L6.42197 4.43152C4.31821 5.53552 3.24291 6.09982 2.6377 7.07264L11.9997 12L21.3617 7.07264C20.7564 6.09982 19.6811 5.53552 17.5774 4.43152Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.5"
                                            d="M21.4026 7.13986C21.3893 7.11727 21.3758 7.09491 21.362 7.07275L12 12.0001V22.0001C12.9443 22.0001 13.8221 21.5395 15.5777 20.6181L17.5777 19.5686C19.7294 18.4395 20.8052 17.8749 21.4026 16.8604C22 15.8459 22 14.5834 22 12.0586V11.9416C22 9.41678 22 8.15436 21.4026 7.13986Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span class="px-1">Components</span>
                                </div>
                                <div class="right_arrow">
                                    <svg class="h-4 w-4 rotate-90" width="16" height="16"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="components-tabs.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="components-accordions.html">Accordions</a>
                                </li>
                                <li>
                                    <a href="components-modals.html">Modals</a>
                                </li>
                                <li>
                                    <a href="components-cards.html">Cards</a>
                                </li>
                                <li>
                                    <a href="components-carousel.html">Carousel</a>
                                </li>
                                <li>
                                    <a href="components-countdown.html">Countdown</a>
                                </li>
                                <li>
                                    <a href="components-counter.html">Counter</a>
                                </li>
                                <li>
                                    <a href="components-sweetalert.html">Sweet Alerts</a>
                                </li>
                                <li>
                                    <a href="components-timeline.html">Timeline</a>
                                </li>
                                <li>
                                    <a href="components-notifications.html">Notifications</a>
                                </li>
                                <li>
                                    <a href="components-media-object.html">Media Object</a>
                                </li>
                                <li>
                                    <a href="components-list-group.html">List Group</a>
                                </li>
                                <li>
                                    <a href="components-pricing-table.html">Pricing Tables</a>
                                </li>
                                <li>
                                    <a href="components-lightbox.html">Lightbox</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu nav-item relative">
                            <a href="javascript:;" class="nav-link">
                                <div class="flex items-center">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M8.73167 5.77133L5.66953 9.91436C4.3848 11.6526 3.74244 12.5217 4.09639 13.205C4.10225 13.2164 4.10829 13.2276 4.1145 13.2387C4.48945 13.9117 5.59888 13.9117 7.81775 13.9117C9.05079 13.9117 9.6673 13.9117 10.054 14.2754L10.074 14.2946L13.946 9.72466L13.926 9.70541C13.5474 9.33386 13.5474 8.74151 13.5474 7.55682V7.24712C13.5474 3.96249 13.5474 2.32018 12.6241 2.03721C11.7007 1.75425 10.711 3.09327 8.73167 5.77133Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.5"
                                            d="M10.4527 16.4432L10.4527 16.7528C10.4527 20.0374 10.4527 21.6798 11.376 21.9627C12.2994 22.2457 13.2891 20.9067 15.2685 18.2286L18.3306 14.0856C19.6154 12.3474 20.2577 11.4783 19.9038 10.7949C19.8979 10.7836 19.8919 10.7724 19.8857 10.7613C19.5107 10.0883 18.4013 10.0883 16.1824 10.0883C14.9494 10.0883 14.3329 10.0883 13.9462 9.72461L10.0742 14.2946C10.4528 14.6661 10.4527 15.2585 10.4527 16.4432Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span class="px-1">Elements</span>
                                </div>
                                <div class="right_arrow">
                                    <svg class="h-4 w-4 rotate-90" width="16" height="16"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="elements-alerts.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="elements-avatar.html">Avatar</a>
                                </li>
                                <li>
                                    <a href="elements-badges.html">Badges</a>
                                </li>
                                <li>
                                    <a href="elements-breadcrumbs.html">Breadcrumbs</a>
                                </li>
                                <li>
                                    <a href="elements-buttons.html">Buttons</a>
                                </li>
                                <li>
                                    <a href="elements-buttons-group.html">Button Groups</a>
                                </li>
                                <li>
                                    <a href="elements-color-library.html">Color Library</a>
                                </li>
                                <li>
                                    <a href="elements-dropdown.html">Dropdown</a>
                                </li>
                                <li>
                                    <a href="elements-infobox.html">Infobox</a>
                                </li>
                                <li>
                                    <a href="elements-jumbotron.html">Jumbotron</a>
                                </li>
                                <li>
                                    <a href="elements-loader.html">Loader</a>
                                </li>
                                <li>
                                    <a href="elements-pagination.html">Pagination</a>
                                </li>
                                <li>
                                    <a href="elements-popovers.html">Popovers</a>
                                </li>
                                <li>
                                    <a href="elements-progress-bar.html">Progress Bar</a>
                                </li>
                                <li>
                                    <a href="elements-search.html">Search</a>
                                </li>
                                <li>
                                    <a href="elements-tooltips.html">Tooltips</a>
                                </li>
                                <li>
                                    <a href="elements-treeview.html">Treeview</a>
                                </li>
                                <li>
                                    <a href="elements-typography.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu nav-item relative">
                            <a href="javascript:;" class="nav-link">
                                <div class="flex items-center">
                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                        <path
                                            d="M4.97883 9.68508C2.99294 8.89073 2 8.49355 2 8C2 7.50645 2.99294 7.10927 4.97883 6.31492L7.7873 5.19153C9.77318 4.39718 10.7661 4 12 4C13.2339 4 14.2268 4.39718 16.2127 5.19153L19.0212 6.31492C21.0071 7.10927 22 7.50645 22 8C22 8.49355 21.0071 8.89073 19.0212 9.68508L16.2127 10.8085C14.2268 11.6028 13.2339 12 12 12C10.7661 12 9.77318 11.6028 7.7873 10.8085L4.97883 9.68508Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M2 8C2 8.49355 2.99294 8.89073 4.97883 9.68508L7.7873 10.8085C9.77318 11.6028 10.7661 12 12 12C13.2339 12 14.2268 11.6028 16.2127 10.8085L19.0212 9.68508C21.0071 8.89073 22 8.49355 22 8C22 7.50645 21.0071 7.10927 19.0212 6.31492L16.2127 5.19153C14.2268 4.39718 13.2339 4 12 4C10.7661 4 9.77318 4.39718 7.7873 5.19153L4.97883 6.31492C2.99294 7.10927 2 7.50645 2 8Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.7"
                                            d="M5.76613 10L4.97883 10.3149C2.99294 11.1093 2 11.5065 2 12C2 12.4935 2.99294 12.8907 4.97883 13.6851L7.7873 14.8085C9.77318 15.6028 10.7661 16 12 16C13.2339 16 14.2268 15.6028 16.2127 14.8085L19.0212 13.6851C21.0071 12.8907 22 12.4935 22 12C22 11.5065 21.0071 11.1093 19.0212 10.3149L18.2339 10L16.2127 10.8085C14.2268 11.6028 13.2339 12 12 12C10.7661 12 9.77318 11.6028 7.7873 10.8085L5.76613 10Z"
                                            fill="currentColor"></path>
                                        <path opacity="0.4"
                                            d="M5.76613 14L4.97883 14.3149C2.99294 15.1093 2 15.5065 2 16C2 16.4935 2.99294 16.8907 4.97883 17.6851L7.7873 18.8085C9.77318 19.6028 10.7661 20 12 20C13.2339 20 14.2268 19.6028 16.2127 18.8085L19.0212 17.6851C21.0071 16.8907 22 16.4935 22 16C22 15.5065 21.0071 15.1093 19.0212 14.3149L18.2339 14L16.2127 14.8085C14.2268 15.6028 13.2339 16 12 16C10.7661 16 9.77318 15.6028 7.7873 14.8085L5.76613 14Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span class="px-1">Tables</span>
                                </div>
                                <div class="right_arrow">
                                    <svg class="h-4 w-4 rotate-90" width="16" height="16"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="tables.html">Tables</a>
                                </li>
                                <li class="relative">
                                    <a href="javascript:;">Data Tables
                                        <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                            <svg width="16" height="16" viewbox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <ul
                                        class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark">
                                        <li>
                                            <a href="datatables-basic.html">Basic</a>
                                        </li>
                                        <li>
                                            <a href="datatables-advanced.html">Advanced</a>
                                        </li>
                                        <li>
                                            <a href="datatables-skin.html">Skin</a>
                                        </li>
                                        <li>
                                            <a href="datatables-order-sorting.html">Order Sorting</a>
                                        </li>
                                        <li>
                                            <a href="datatables-multi-column.html">Multi Column</a>
                                        </li>
                                        <li>
                                            <a href="datatables-multiple-tables.html">Multiple Tables</a>
                                        </li>
                                        <li>
                                            <a href="datatables-alt-pagination.html">Alt. Pagination</a>
                                        </li>
                                        <li>
                                            <a href="datatables-checkbox.html">Checkbox</a>
                                        </li>
                                        <li>
                                            <a href="datatables-range-search.html">Range Search</a>
                                        </li>
                                        <li>
                                            <a href="datatables-export.html">Export</a>
                                        </li>
                                        <li>
                                            <a href="datatables-sticky-header.html">Sticky Header</a>
                                        </li>
                                        <li>
                                            <a href="datatables-clone-header.html">Clone Header</a>
                                        </li>
                                        <li>
                                            <a href="datatables-column-chooser.html">Column Chooser</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu nav-item relative">
                            <a href="javascript:;" class="nav-link">
                                <div class="flex items-center">
                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                        <path opacity="0.5"
                                            d="M3 10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H13C16.7712 2 18.6569 2 19.8284 3.17157C21 4.34315 21 6.22876 21 10V14C21 17.7712 21 19.6569 19.8284 20.8284C18.6569 22 16.7712 22 13 22H11C7.22876 22 5.34315 22 4.17157 20.8284C3 19.6569 3 17.7712 3 14V10Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M16.5189 16.5013C16.6939 16.3648 16.8526 16.2061 17.1701 15.8886L21.1275 11.9312C21.2231 11.8356 21.1793 11.6708 21.0515 11.6264C20.5844 11.4644 19.9767 11.1601 19.4083 10.5917C18.8399 10.0233 18.5356 9.41561 18.3736 8.94849C18.3292 8.82066 18.1644 8.77687 18.0688 8.87254L14.1114 12.8299C13.7939 13.1474 13.6352 13.3061 13.4987 13.4811C13.3377 13.6876 13.1996 13.9109 13.087 14.1473C12.9915 14.3476 12.9205 14.5606 12.7786 14.9865L12.5951 15.5368L12.3034 16.4118L12.0299 17.2323C11.9601 17.4419 12.0146 17.6729 12.1708 17.8292C12.3271 17.9854 12.5581 18.0399 12.7677 17.9701L13.5882 17.6966L14.4632 17.4049L15.0135 17.2214L15.0136 17.2214C15.4394 17.0795 15.6524 17.0085 15.8527 16.913C16.0891 16.8004 16.3124 16.6623 16.5189 16.5013Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M22.3665 10.6922C23.2112 9.84754 23.2112 8.47812 22.3665 7.63348C21.5219 6.78884 20.1525 6.78884 19.3078 7.63348L19.1806 7.76071C19.0578 7.88348 19.0022 8.05496 19.0329 8.22586C19.0522 8.33336 19.0879 8.49053 19.153 8.67807C19.2831 9.05314 19.5288 9.54549 19.9917 10.0083C20.4545 10.4712 20.9469 10.7169 21.3219 10.847C21.5095 10.9121 21.6666 10.9478 21.7741 10.9671C21.945 10.9978 22.1165 10.9422 22.2393 10.8194L22.3665 10.6922Z"
                                            fill="currentColor"></path>
                                        <path fill-rule="evenodd" clip-rule="evenodd"
                                            d="M7.25 9C7.25 8.58579 7.58579 8.25 8 8.25H14.5C14.9142 8.25 15.25 8.58579 15.25 9C15.25 9.41421 14.9142 9.75 14.5 9.75H8C7.58579 9.75 7.25 9.41421 7.25 9ZM7.25 13C7.25 12.5858 7.58579 12.25 8 12.25H11C11.4142 12.25 11.75 12.5858 11.75 13C11.75 13.4142 11.4142 13.75 11 13.75H8C7.58579 13.75 7.25 13.4142 7.25 13ZM7.25 17C7.25 16.5858 7.58579 16.25 8 16.25H9.5C9.91421 16.25 10.25 16.5858 10.25 17C10.25 17.4142 9.91421 17.75 9.5 17.75H8C7.58579 17.75 7.25 17.4142 7.25 17Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span class="px-1">Forms</span>
                                </div>
                                <div class="right_arrow">
                                    <svg class="h-4 w-4 rotate-90" width="16" height="16"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="forms-basic.html">Basic</a>
                                </li>
                                <li>
                                    <a href="forms-input-group.html">Input Group</a>
                                </li>
                                <li>
                                    <a href="forms-layouts.html">Layouts</a>
                                </li>
                                <li>
                                    <a href="forms-validation.html">Validation</a>
                                </li>
                                <li>
                                    <a href="forms-input-mask.html">Input Mask</a>
                                </li>
                                <li>
                                    <a href="forms-select2.html">Select2</a>
                                </li>
                                <li>
                                    <a href="forms-touchspin.html">TouchSpin</a>
                                </li>
                                <li>
                                    <a href="forms-checkbox-radio.html">Checkbox & Radio</a>
                                </li>
                                <li>
                                    <a href="forms-switches.html">Switches</a>
                                </li>
                                <li>
                                    <a href="forms-wizards.html">Wizards</a>
                                </li>
                                <li>
                                    <a href="forms-file-upload.html">File Upload</a>
                                </li>
                                <li>
                                    <a href="forms-quill-editor.html">Quill Editor</a>
                                </li>
                                <li>
                                    <a href="forms-markdown-editor.html">Markdown Editor</a>
                                </li>
                                <li>
                                    <a href="forms-date-picker.html">Date & Range Picker</a>
                                </li>
                                <li>
                                    <a href="forms-clipboard.html">Clipboard</a>
                                </li>
                            </ul>
                        </li>
                        <li class="menu nav-item relative">
                            <a href="javascript:;" class="nav-link">
                                <div class="flex items-center">
                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                        <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd"
                                            d="M14 22H10C6.22876 22 4.34315 22 3.17157 20.8284C2 19.6569 2 17.7712 2 14V10C2 6.22876 2 4.34315 3.17157 3.17157C4.34315 2 6.23869 2 10.0298 2C10.6358 2 11.1214 2 11.53 2.01666C11.5166 2.09659 11.5095 2.17813 11.5092 2.26057L11.5 5.09497C11.4999 6.19207 11.4998 7.16164 11.6049 7.94316C11.7188 8.79028 11.9803 9.63726 12.6716 10.3285C13.3628 11.0198 14.2098 11.2813 15.0569 11.3952C15.8385 11.5003 16.808 11.5002 17.9051 11.5001L18 11.5001H21.9574C22 12.0344 22 12.6901 22 13.5629V14C22 17.7712 22 19.6569 20.8284 20.8284C19.6569 22 17.7712 22 14 22Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M6 13.75C5.58579 13.75 5.25 14.0858 5.25 14.5C5.25 14.9142 5.58579 15.25 6 15.25H14C14.4142 15.25 14.75 14.9142 14.75 14.5C14.75 14.0858 14.4142 13.75 14 13.75H6Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M6 17.25C5.58579 17.25 5.25 17.5858 5.25 18C5.25 18.4142 5.58579 18.75 6 18.75H11.5C11.9142 18.75 12.25 18.4142 12.25 18C12.25 17.5858 11.9142 17.25 11.5 17.25H6Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M11.5092 2.2601L11.5 5.0945C11.4999 6.1916 11.4998 7.16117 11.6049 7.94269C11.7188 8.78981 11.9803 9.6368 12.6716 10.3281C13.3629 11.0193 14.2098 11.2808 15.057 11.3947C15.8385 11.4998 16.808 11.4997 17.9051 11.4996L21.9574 11.4996C21.9698 11.6552 21.9786 11.821 21.9848 11.9995H22C22 11.732 22 11.5983 21.9901 11.4408C21.9335 10.5463 21.5617 9.52125 21.0315 8.79853C20.9382 8.6713 20.8743 8.59493 20.7467 8.44218C19.9542 7.49359 18.911 6.31193 18 5.49953C17.1892 4.77645 16.0787 3.98536 15.1101 3.3385C14.2781 2.78275 13.862 2.50487 13.2915 2.29834C13.1403 2.24359 12.9408 2.18311 12.7846 2.14466C12.4006 2.05013 12.0268 2.01725 11.5 2.00586L11.5092 2.2601Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span class="px-1">Pages</span>
                                </div>
                                <div class="right_arrow">
                                    <svg class="h-4 w-4 rotate-90" width="16" height="16"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                <li class="relative">
                                    <a href="javascript:;">Users
                                        <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                            <svg width="16" height="16" viewbox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <ul
                                        class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark">
                                        <li>
                                            <a href="users-profile.html">Profile</a>
                                        </li>
                                        <li>
                                            <a href="users-account-settings.html">Account Settings</a>
                                        </li>
                                    </ul>
                                </li>
                                <li>
                                    <a href="pages-knowledge-base.html">Knowledge Base</a>
                                </li>
                                <li>
                                    <a href="pages-contact-us-boxed.html" target="_blank">Contact Us Boxed</a>
                                </li>
                                <li>
                                    <a href="pages-contact-us-cover.html" target="_blank">Contact Us Cover</a>
                                </li>
                                <li>
                                    <a href="pages-faq.html">Faq</a>
                                </li>
                                <li>
                                    <a href="pages-coming-soon-boxed.html" target="_blank">Coming Soon Boxed</a>
                                </li>
                                <li>
                                    <a href="pages-coming-soon-cover.html" target="_blank">Coming Soon Cover</a>
                                </li>
                                <li>
                                    <a href="pages-maintenence.html" target="_blank">Maintanence</a>
                                </li>
                                <li class="relative">
                                    <a href="javascript:;">Error
                                        <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                            <svg width="16" height="16" viewbox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <ul
                                        class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark">
                                        <li>
                                            <a href="pages-error404.html" target="_blank">404</a>
                                        </li>
                                        <li>
                                            <a href="pages-error500.html" target="_blank">500</a>
                                        </li>
                                        <li>
                                            <a href="pages-error503.html" target="_blank">503</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="relative">
                                    <a href="javascript:;">Login
                                        <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                            <svg width="16" height="16" viewbox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <ul
                                        class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark">
                                        <li>
                                            <a href="auth-cover-login.html" target="_blank">Login Cover</a>
                                        </li>
                                        <li>
                                            <a href="auth-boxed-signin.html" target="_blank">Login Boxed</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="relative">
                                    <a href="javascript:;">Register
                                        <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                            <svg width="16" height="16" viewbox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <ul
                                        class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark">
                                        <li>
                                            <a href="auth-cover-register.html" target="_blank">Register Cover</a>
                                        </li>
                                        <li>
                                            <a href="auth-boxed-signup.html" target="_blank">Register Boxed</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="relative">
                                    <a href="javascript:;">Password Recovery
                                        <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                            <svg width="16" height="16" viewbox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <ul
                                        class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark">
                                        <li>
                                            <a href="auth-cover-password-reset.html" target="_blank">Recover ID
                                                Cover</a>
                                        </li>
                                        <li>
                                            <a href="auth-boxed-password-reset.html" target="_blank">Recover ID
                                                Boxed</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="relative">
                                    <a href="javascript:;">Lockscreen
                                        <div class="ltr:ml-auto rtl:mr-auto rtl:rotate-180">
                                            <svg width="16" height="16" viewbox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                            </svg>
                                        </div>
                                    </a>
                                    <ul
                                        class="absolute top-0 z-[10] hidden min-w-[180px] rounded bg-white p-0 py-2 text-dark shadow ltr:left-[95%] rtl:right-[95%] dark:bg-[#1b2e4b] dark:text-white-dark">
                                        <li>
                                            <a href="auth-cover-lockscreen.html" target="_blank">Unlock Cover</a>
                                        </li>
                                        <li>
                                            <a href="auth-boxed-lockscreen.html" target="_blank">Unlock Boxed</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu nav-item relative">
                            <a href="javascript:;" class="nav-link">
                                <div class="flex items-center">
                                    <svg width="20" height="20" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="shrink-0">
                                        <path opacity="0.5"
                                            d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                            fill="currentColor"></path>
                                        <path
                                            d="M12.75 9C12.75 8.58579 12.4142 8.25 12 8.25C11.5858 8.25 11.25 8.58579 11.25 9L11.25 11.25H9C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75H11.25V15C11.25 15.4142 11.5858 15.75 12 15.75C12.4142 15.75 12.75 15.4142 12.75 15L12.75 12.75H15C15.4142 12.75 15.75 12.4142 15.75 12C15.75 11.5858 15.4142 11.25 15 11.25H12.75V9Z"
                                            fill="currentColor"></path>
                                    </svg>
                                    <span class="px-1">More</span>
                                </div>
                                <div class="right_arrow">
                                    <svg class="h-4 w-4 rotate-90" width="16" height="16"
                                        viewbox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M9 5L15 12L9 19" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                    </svg>
                                </div>
                            </a>
                            <ul class="sub-menu">
                                <li>
                                    <a href="dragndrop.html">Drag and Drop</a>
                                </li>
                                <li>
                                    <a href="charts.html">Charts</a>
                                </li>
                                <li>
                                    <a href="font-icons.html">Font Icons</a>
                                </li>
                                <li>
                                    <a href="widgets.html">Widgets</a>
                                </li>
                                <li>
                                    <a href="souysoeng.com" target="_blank">Documentation</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </header>
            <!-- end header section -->

            <div class="animate__animated p-6" :class="[$store.app.animation]">
                <!-- start main content section -->
                <div x-data="chat">
                    <div class="relative flex h-full gap-5 sm:h-[calc(100vh_-_150px)] sm:min-h-0"
                        :class="{ 'min-h-[999px]': isShowChatMenu }">
                        <div class="panel absolute z-10 hidden w-full max-w-xs flex-none space-y-4 overflow-hidden p-4 xl:relative xl:block xl:h-full"
                            :class="isShowChatMenu && '!block'">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center">
                                    <div class="flex-none"><img src="assets/images/profile-34.jpeg"
                                            class="h-12 w-12 rounded-full object-cover"></div>
                                    <div class="mx-3">
                                        <p class="mb-1 font-semibold">Alon Smith</p>
                                        <p class="text-xs text-white-dark">Software Developer</p>
                                    </div>
                                </div>
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <button type="button"
                                        class="flex h-8 w-8 items-center justify-center rounded-full bg-[#f4f4f4] hover:bg-primary-light dark:bg-[#1b2e4b]"
                                        @click="toggle">
                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 opacity-70">
                                            <circle cx="5" cy="12" r="2" stroke="currentColor"
                                                stroke-width="1.5"></circle>
                                            <circle opacity="0.5" cx="12" cy="12" r="2"
                                                stroke="currentColor" stroke-width="1.5"></circle>
                                            <circle cx="19" cy="12" r="2" stroke="currentColor"
                                                stroke-width="1.5"></circle>
                                        </svg>
                                    </button>

                                    <ul x-cloak="" x-show="open" x-transition=""
                                        x-transition.duration.300ms=""
                                        class="whitespace-nowrap ltr:right-0 rtl:left-0">
                                        <li>
                                            <a href="javascript:;" @click="toggle">
                                                <svg width="24" height="24" viewbox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4.5 w-4.5 shrink-0 ltr:mr-1 rtl:ml-1">
                                                    <circle cx="12" cy="12" r="3"
                                                        stroke="currentColor" stroke-width="1.5"></circle>
                                                    <path opacity="0.5"
                                                        d="M13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74457 2.35523 9.35522 2.74458 9.15223 3.23463C9.05957 3.45834 9.0233 3.7185 9.00911 4.09799C8.98826 4.65568 8.70226 5.17189 8.21894 5.45093C7.73564 5.72996 7.14559 5.71954 6.65219 5.45876C6.31645 5.2813 6.07301 5.18262 5.83294 5.15102C5.30704 5.08178 4.77518 5.22429 4.35436 5.5472C4.03874 5.78938 3.80577 6.1929 3.33983 6.99993C2.87389 7.80697 2.64092 8.21048 2.58899 8.60491C2.51976 9.1308 2.66227 9.66266 2.98518 10.0835C3.13256 10.2756 3.3397 10.437 3.66119 10.639C4.1338 10.936 4.43789 11.4419 4.43786 12C4.43783 12.5581 4.13375 13.0639 3.66118 13.3608C3.33965 13.5629 3.13248 13.7244 2.98508 13.9165C2.66217 14.3373 2.51966 14.8691 2.5889 15.395C2.64082 15.7894 2.87379 16.193 3.33973 17C3.80568 17.807 4.03865 18.2106 4.35426 18.4527C4.77508 18.7756 5.30694 18.9181 5.83284 18.8489C6.07289 18.8173 6.31632 18.7186 6.65204 18.5412C7.14547 18.2804 7.73556 18.27 8.2189 18.549C8.70224 18.8281 8.98826 19.3443 9.00911 19.9021C9.02331 20.2815 9.05957 20.5417 9.15223 20.7654C9.35522 21.2554 9.74457 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8477 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.902C15.0117 19.3443 15.2977 18.8281 15.781 18.549C16.2643 18.2699 16.8544 18.2804 17.3479 18.5412C17.6836 18.7186 17.927 18.8172 18.167 18.8488C18.6929 18.9181 19.2248 18.7756 19.6456 18.4527C19.9612 18.2105 20.1942 17.807 20.6601 16.9999C21.1261 16.1929 21.3591 15.7894 21.411 15.395C21.4802 14.8691 21.3377 14.3372 21.0148 13.9164C20.8674 13.7243 20.6602 13.5628 20.3387 13.3608C19.8662 13.0639 19.5621 12.558 19.5621 11.9999C19.5621 11.4418 19.8662 10.9361 20.3387 10.6392C20.6603 10.4371 20.8675 10.2757 21.0149 10.0835C21.3378 9.66273 21.4803 9.13087 21.4111 8.60497C21.3592 8.21055 21.1262 7.80703 20.6602 7C20.1943 6.19297 19.9613 5.78945 19.6457 5.54727C19.2249 5.22436 18.693 5.08185 18.1671 5.15109C17.9271 5.18269 17.6837 5.28136 17.3479 5.4588C16.8545 5.71959 16.2644 5.73002 15.7811 5.45096C15.2977 5.17191 15.0117 4.65566 14.9909 4.09794C14.9767 3.71848 14.9404 3.45833 14.8477 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224Z"
                                                        stroke="currentColor" stroke-width="1.5"></path>
                                                </svg>
                                                Settings</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" @click="toggle">
                                                <svg width="24" height="24" viewbox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4.5 w-4.5 shrink-0 ltr:mr-1 rtl:ml-1">
                                                    <circle opacity="0.5" cx="12" cy="12" r="10"
                                                        stroke="currentColor" stroke-width="1.5"></circle>
                                                    <path
                                                        d="M10.125 8.875C10.125 7.83947 10.9645 7 12 7C13.0355 7 13.875 7.83947 13.875 8.875C13.875 9.56245 13.505 10.1635 12.9534 10.4899C12.478 10.7711 12 11.1977 12 11.75V13"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round"></path>
                                                    <circle cx="12" cy="16" r="1"
                                                        fill="currentColor"></circle>
                                                </svg>
                                                Help & feedback</a>
                                        </li>
                                        <li>
                                            <a href="javascript:;" @click="toggle">
                                                <svg width="24" height="24" viewbox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="h-4.5 w-4.5 shrink-0 ltr:mr-1 rtl:ml-1">
                                                    <path
                                                        d="M2.00098 11.999L16.001 11.999M16.001 11.999L12.501 8.99902M16.001 11.999L12.501 14.999"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                                    <path opacity="0.5"
                                                        d="M9.00195 7C9.01406 4.82497 9.11051 3.64706 9.87889 2.87868C10.7576 2 12.1718 2 15.0002 2L16.0002 2C18.8286 2 20.2429 2 21.1215 2.87868C22.0002 3.75736 22.0002 5.17157 22.0002 8L22.0002 16C22.0002 18.8284 22.0002 20.2426 21.1215 21.1213C20.2429 22 18.8286 22 16.0002 22H15.0002C12.1718 22 10.7576 22 9.87889 21.1213C9.11051 20.3529 9.01406 19.175 9.00195 17"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round"></path>
                                                </svg>
                                                Sign Out</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="relative">
                                <input type="text" class="peer form-input ltr:pr-9 rtl:pl-9"
                                    placeholder="Searching..." x-model="searchUser" @keyup="searchUsers">
                                <div
                                    class="absolute top-1/2 -translate-y-1/2 peer-focus:text-primary ltr:right-2 rtl:left-2">
                                    <svg width="16" height="16" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <circle cx="11.5" cy="11.5" r="9.5" stroke="currentColor"
                                            stroke-width="1.5" opacity="0.5"></circle>
                                        <path d="M18.5 18.5L22 22" stroke="currentColor" stroke-width="1.5"
                                            stroke-linecap="round"></path>
                                    </svg>
                                </div>
                            </div>
                            <div class="flex items-center justify-between text-xs">
                                <button type="button" class="group hover:text-primary">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-1 h-5 w-5">
                                        <path opacity="0.5"
                                            d="M13.0867 21.3877L13.7321 21.7697L13.0867 21.3877ZM13.6288 20.4718L12.9833 20.0898L13.6288 20.4718ZM10.3712 20.4718L9.72579 20.8539H9.72579L10.3712 20.4718ZM10.9133 21.3877L11.5587 21.0057L10.9133 21.3877ZM13.5 2.75C13.9142 2.75 14.25 2.41421 14.25 2C14.25 1.58579 13.9142 1.25 13.5 1.25V2.75ZM22.75 10.5C22.75 10.0858 22.4142 9.75 22 9.75C21.5858 9.75 21.25 10.0858 21.25 10.5H22.75ZM2.3806 15.9134L3.07351 15.6264V15.6264L2.3806 15.9134ZM7.78958 18.9915L7.77666 19.7413L7.78958 18.9915ZM5.08658 18.6194L4.79957 19.3123H4.79957L5.08658 18.6194ZM21.6194 15.9134L22.3123 16.2004V16.2004L21.6194 15.9134ZM16.2104 18.9915L16.1975 18.2416L16.2104 18.9915ZM18.9134 18.6194L19.2004 19.3123H19.2004L18.9134 18.6194ZM4.38751 2.7368L3.99563 2.09732V2.09732L4.38751 2.7368ZM2.7368 4.38751L2.09732 3.99563H2.09732L2.7368 4.38751ZM9.40279 19.2098L9.77986 18.5615L9.77986 18.5615L9.40279 19.2098ZM13.7321 21.7697L14.2742 20.8539L12.9833 20.0898L12.4412 21.0057L13.7321 21.7697ZM9.72579 20.8539L10.2679 21.7697L11.5587 21.0057L11.0166 20.0898L9.72579 20.8539ZM12.4412 21.0057C12.2485 21.3313 11.7515 21.3313 11.5587 21.0057L10.2679 21.7697C11.0415 23.0767 12.9585 23.0767 13.7321 21.7697L12.4412 21.0057ZM10.5 2.75H13.5V1.25H10.5V2.75ZM21.25 10.5V11.5H22.75V10.5H21.25ZM2.75 11.5V10.5H1.25V11.5H2.75ZM1.25 11.5C1.25 12.6546 1.24959 13.5581 1.29931 14.2868C1.3495 15.0223 1.45323 15.6344 1.68769 16.2004L3.07351 15.6264C2.92737 15.2736 2.84081 14.8438 2.79584 14.1847C2.75041 13.5189 2.75 12.6751 2.75 11.5H1.25ZM7.8025 18.2416C6.54706 18.2199 5.88923 18.1401 5.37359 17.9265L4.79957 19.3123C5.60454 19.6457 6.52138 19.7197 7.77666 19.7413L7.8025 18.2416ZM1.68769 16.2004C2.27128 17.6093 3.39066 18.7287 4.79957 19.3123L5.3736 17.9265C4.33223 17.4951 3.50486 16.6678 3.07351 15.6264L1.68769 16.2004ZM21.25 11.5C21.25 12.6751 21.2496 13.5189 21.2042 14.1847C21.1592 14.8438 21.0726 15.2736 20.9265 15.6264L22.3123 16.2004C22.5468 15.6344 22.6505 15.0223 22.7007 14.2868C22.7504 13.5581 22.75 12.6546 22.75 11.5H21.25ZM16.2233 19.7413C17.4786 19.7197 18.3955 19.6457 19.2004 19.3123L18.6264 17.9265C18.1108 18.1401 17.4529 18.2199 16.1975 18.2416L16.2233 19.7413ZM20.9265 15.6264C20.4951 16.6678 19.6678 17.4951 18.6264 17.9265L19.2004 19.3123C20.6093 18.7287 21.7287 17.6093 22.3123 16.2004L20.9265 15.6264ZM10.5 1.25C8.87781 1.25 7.6085 1.24921 6.59611 1.34547C5.57256 1.44279 4.73445 1.64457 3.99563 2.09732L4.77938 3.37628C5.24291 3.09223 5.82434 2.92561 6.73809 2.83873C7.663 2.75079 8.84876 2.75 10.5 2.75V1.25ZM2.75 10.5C2.75 8.84876 2.75079 7.663 2.83873 6.73809C2.92561 5.82434 3.09223 5.24291 3.37628 4.77938L2.09732 3.99563C1.64457 4.73445 1.44279 5.57256 1.34547 6.59611C1.24921 7.6085 1.25 8.87781 1.25 10.5H2.75ZM3.99563 2.09732C3.22194 2.57144 2.57144 3.22194 2.09732 3.99563L3.37628 4.77938C3.72672 4.20752 4.20752 3.72672 4.77938 3.37628L3.99563 2.09732ZM11.0166 20.0898C10.8136 19.7468 10.6354 19.4441 10.4621 19.2063C10.2795 18.9559 10.0702 18.7304 9.77986 18.5615L9.02572 19.8582C9.07313 19.8857 9.13772 19.936 9.24985 20.0898C9.37122 20.2564 9.50835 20.4865 9.72579 20.8539L11.0166 20.0898ZM7.77666 19.7413C8.21575 19.7489 8.49387 19.7545 8.70588 19.7779C8.90399 19.7999 8.98078 19.832 9.02572 19.8582L9.77986 18.5615C9.4871 18.3912 9.18246 18.3215 8.87097 18.287C8.57339 18.2541 8.21375 18.2487 7.8025 18.2416L7.77666 19.7413ZM14.2742 20.8539C14.4916 20.4865 14.6287 20.2564 14.7501 20.0898C14.8622 19.936 14.9268 19.8857 14.9742 19.8582L14.2201 18.5615C13.9298 18.7304 13.7204 18.9559 13.5379 19.2063C13.3646 19.4441 13.1864 19.7468 12.9833 20.0898L14.2742 20.8539ZM16.1975 18.2416C15.7862 18.2487 15.4266 18.2541 15.129 18.287C14.8175 18.3215 14.5129 18.3912 14.2201 18.5615L14.9742 19.8582C15.0192 19.832 15.096 19.7999 15.2941 19.7779C15.5061 19.7545 15.7842 19.7489 16.2233 19.7413L16.1975 18.2416Z"
                                            fill="currentColor"></path>
                                        <circle cx="19" cy="5" r="3" stroke="currentColor"
                                            stroke-width="1.5"></circle>
                                    </svg>
                                    Chats
                                </button>

                                <button type="button" class="group hover:text-primary">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-1 h-5 w-5">
                                        <path
                                            d="M5.00659 6.93309C5.04956 5.7996 5.70084 4.77423 6.53785 3.93723C7.9308 2.54428 10.1532 2.73144 11.0376 4.31617L11.6866 5.4791C12.2723 6.52858 12.0372 7.90533 11.1147 8.8278M17.067 18.9934C18.2004 18.9505 19.2258 18.2992 20.0628 17.4622C21.4558 16.0692 21.2686 13.8468 19.6839 12.9624L18.5209 12.3134C17.4715 11.7277 16.0947 11.9628 15.1722 12.8853"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                        <path opacity="0.5"
                                            d="M5.00655 6.93311C4.93421 8.84124 5.41713 12.0817 8.6677 15.3323C11.9183 18.5829 15.1588 19.0658 17.0669 18.9935M15.1722 12.8853C15.1722 12.8853 14.0532 14.0042 12.0245 11.9755C9.99578 9.94676 11.1147 8.82782 11.1147 8.82782"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                    </svg>
                                    Calls
                                </button>

                                <button type="button" class="group hover:text-primary">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-1 h-5 w-5">
                                        <circle cx="10" cy="6" r="4" stroke="currentColor"
                                            stroke-width="1.5"></circle>
                                        <path opacity="0.5"
                                            d="M18 17.5C18 19.9853 18 22 10 22C2 22 2 19.9853 2 17.5C2 15.0147 5.58172 13 10 13C14.4183 13 18 15.0147 18 17.5Z"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                        <path d="M21 10H19M19 10H17M19 10L19 8M19 10L19 12" stroke="currentColor"
                                            stroke-width="1.5" stroke-linecap="round"></path>
                                    </svg>
                                    Contacts
                                </button>

                                <button type="button" class="group hover:text-primary">
                                    <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                        xmlns="http://www.w3.org/2000/svg" class="mx-auto mb-1 h-5 w-5">
                                        <path
                                            d="M19.0001 9.7041V9C19.0001 5.13401 15.8661 2 12.0001 2C8.13407 2 5.00006 5.13401 5.00006 9V9.7041C5.00006 10.5491 4.74995 11.3752 4.28123 12.0783L3.13263 13.8012C2.08349 15.3749 2.88442 17.5139 4.70913 18.0116C9.48258 19.3134 14.5175 19.3134 19.291 18.0116C21.1157 17.5139 21.9166 15.3749 20.8675 13.8012L19.7189 12.0783C19.2502 11.3752 19.0001 10.5491 19.0001 9.7041Z"
                                            stroke="currentColor" stroke-width="1.5"></path>
                                        <path opacity="0.5"
                                            d="M7.5 19C8.15503 20.7478 9.92246 22 12 22C14.0775 22 15.845 20.7478 16.5 19"
                                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round">
                                        </path>
                                    </svg>
                                    Notification
                                </button>
                            </div>
                            <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                            <div class="!mt-0">
                                <div
                                    class="chat-users perfect-scrollbar relative -mr-3.5 h-full min-h-[100px] space-y-0.5 pr-3.5 sm:h-[calc(100vh_-_357px)]">
                                    <template x-for="person in searchUsers">
                                        <button type="button"
                                            class="flex w-full items-center justify-between rounded-md p-2 hover:bg-gray-100 hover:text-primary dark:hover:bg-[#050b14] dark:hover:text-primary"
                                            :class="{ 'bg-gray-100 dark:bg-[#050b14] dark:text-primary text-primary': selectedUser
                                                    .userId === person.userId }"
                                            @click="selectUser(person)">
                                            <div class="flex-1">
                                                <div class="flex items-center">
                                                    <div class="relative flex-shrink-0">
                                                        <img :src="`assets/images/${person.path}`"
                                                            class="h-12 w-12 rounded-full object-cover">
                                                        <template x-if="person.active">
                                                            <div class="absolute bottom-0 ltr:right-0 rtl:left-0">
                                                                <div class="h-4 w-4 rounded-full bg-success"></div>
                                                            </div>
                                                        </template>
                                                    </div>
                                                    <div class="mx-3 ltr:text-left rtl:text-right">
                                                        <p class="mb-1 font-semibold" x-text="person.name"></p>
                                                        <p class="max-w-[185px] truncate text-xs text-white-dark"
                                                            x-text="person.preview"></p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="whitespace-nowrap text-xs font-semibold">
                                                <p x-text="person.time"></p>
                                            </div>
                                        </button>
                                    </template>
                                </div>
                            </div>
                        </div>
                        <div class="absolute z-[5] hidden h-full w-full rounded-md bg-black/60"
                            :class="isShowChatMenu && '!block xl:!hidden'" @click="isShowChatMenu = !isShowChatMenu">
                        </div>
                        <div class="panel flex-1 p-0">
                            <template x-if="!isShowUserChat">
                                <div class="relative flex h-full items-center justify-center p-4">
                                    <button type="button"
                                        class="absolute top-4 hover:text-primary ltr:left-4 rtl:right-4 xl:hidden"
                                        @click="isShowChatMenu = !isShowChatMenu">
                                        <svg width="24" height="24" viewbox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg" class="h-6 w-6">
                                            <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round"></path>
                                            <path opacity="0.5" d="M20 12L4 12" stroke="currentColor"
                                                stroke-width="1.5" stroke-linecap="round"></path>
                                            <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5"
                                                stroke-linecap="round"></path>
                                        </svg>
                                    </button>

                                    <div class="flex flex-col items-center justify-center py-8">
                                        <!-- <img src="assets/images/chat_img.svg" alt="image" class="w-[280px] md:w-[430px] mx-auto mb-8 h-[calc(100vh_-_320px)] min-h-[120px]" /> -->
                                        <div
                                            class="mb-8 h-[calc(100vh_-_320px)] min-h-[120px] w-[280px] text-white dark:text-[#0e1726] md:w-[430px]">
                                            <svg xmlns="http://www.w3.org/2000/svg" data-name="Layer 1"
                                                class="h-full w-full" viewbox="0 0 891.29496 745.19434"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <ellipse cx="418.64354" cy="727.19434" rx="352"
                                                    ry="18"
                                                    :fill="$store.app.theme === 'dark' || $store.app.isDarkMode ?
                                                        '#888ea8' : '#e6e6e6'">
                                                </ellipse>
                                                <path
                                                    d="M778.64963,250.35008h-3.99878V140.80476a63.40187,63.40187,0,0,0-63.4018-63.40193H479.16232a63.40188,63.40188,0,0,0-63.402,63.4017v600.9744a63.40189,63.40189,0,0,0,63.4018,63.40192H711.24875a63.40187,63.40187,0,0,0,63.402-63.40168V328.32632h3.99878Z"
                                                    transform="translate(-154.35252 -77.40283)" fill="#3f3d56">
                                                </path>
                                                <path
                                                    d="M761.156,141.24713v600.09a47.35072,47.35072,0,0,1-47.35,47.35h-233.2a47.35084,47.35084,0,0,1-47.35-47.35v-600.09a47.3509,47.3509,0,0,1,47.35-47.35h28.29a22.50659,22.50659,0,0,0,20.83,30.99h132.96a22.50672,22.50672,0,0,0,20.83-30.99h30.29A47.35088,47.35088,0,0,1,761.156,141.24713Z"
                                                    transform="translate(-154.35252 -77.40283)" fill="currentColor">
                                                </path>
                                                <path
                                                    d="M686.03027,400.0032q-2.32543,1.215-4.73047,2.3-2.18994.99-4.4497,1.86c-.5503.21-1.10987.42-1.66992.63a89.52811,89.52811,0,0,1-13.6001,3.75q-3.43506.675-6.96,1.06-2.90991.33-5.87989.47c-1.41015.07-2.82031.1-4.24023.1a89.84124,89.84124,0,0,1-16.75977-1.57c-1.44043-.26-2.85009-.57-4.26025-.91a88.77786,88.77786,0,0,1-19.66992-7.26c-.56006-.28-1.12012-.58-1.68018-.87-.83008-.44-1.63965-.9-2.4497-1.38.38964-.54.81005-1.07,1.23974-1.59a53.03414,53.03414,0,0,1,78.87012-4.1,54.27663,54.27663,0,0,1,5.06006,5.86C685.25977,398.89316,685.6499,399.44321,686.03027,400.0032Z"
                                                    transform="translate(-154.35252 -77.40283)" fill="#6c63ff">
                                                </path>
                                                <circle cx="492.14325" cy="234.76352" r="43.90974" fill="#2f2e41">
                                                </circle>
                                                <circle cx="642.49883" cy="327.46205" r="32.68086"
                                                    transform="translate(-232.6876 270.90663) rotate(-28.66315)"
                                                    fill="#a0616a"></circle>
                                                <path
                                                    d="M676.8388,306.90589a44.44844,44.44844,0,0,1-25.402,7.85033,27.23846,27.23846,0,0,0,10.796,4.44154,89.62764,89.62764,0,0,1-36.61.20571,23.69448,23.69448,0,0,1-7.66395-2.63224,9.699,9.699,0,0,1-4.73055-6.3266c-.80322-4.58859,2.77227-8.75743,6.488-11.567a47.85811,47.85811,0,0,1,40.21662-8.03639c4.49246,1.16124,8.99288,3.12327,11.91085,6.731s3.78232,9.16981,1.00224,12.88488Z"
                                                    transform="translate(-154.35252 -77.40283)" fill="#2f2e41">
                                                </path>
                                                <path
                                                    d="M644.5,230.17319a89.98675,89.98675,0,0,0-46.83984,166.83l.58007.34q.72.43506,1.43995.84c.81005.48,1.61962.94,2.4497,1.38.56006.29,1.12012.59,1.68018.87a88.77786,88.77786,0,0,0,19.66992,7.26c1.41016.34,2.81982.65,4.26025.91a89.84124,89.84124,0,0,0,16.75977,1.57c1.41992,0,2.83008-.03,4.24023-.1q2.97-.135,5.87989-.47,3.52513-.39,6.96-1.06a89.52811,89.52811,0,0,0,13.6001-3.75c.56005-.21,1.11962-.42,1.66992-.63q2.26464-.87,4.4497-1.86,2.40015-1.08,4.73047-2.3a90.7919,90.7919,0,0,0,37.03955-35.97c.04-.07995.09034-.16.13038-.24a89.30592,89.30592,0,0,0,9.6499-26.41,90.051,90.051,0,0,0-88.3501-107.21Zm77.06006,132.45c-.08008.14-.1499.28-.23.41a88.17195,88.17195,0,0,1-36.48,35.32q-2.29542,1.2-4.66992,2.25c-1.31006.59-2.64991,1.15-4,1.67-.57032.22-1.14991.44-1.73.64a85.72126,85.72126,0,0,1-11.73,3.36,84.69473,84.69473,0,0,1-8.95019,1.41c-1.8501.2-3.73.34-5.62012.41-1.21.05-2.42969.08-3.6499.08a86.762,86.762,0,0,1-16.21973-1.51,85.62478,85.62478,0,0,1-9.63037-2.36,88.46592,88.46592,0,0,1-13.98974-5.67c-.52-.27-1.04-.54-1.5503-.82-.73-.39-1.46972-.79-2.18994-1.22-.54-.3-1.08008-.62-1.60986-.94-.31006-.18-.62012-.37-.93018-.56a88.06851,88.06851,0,1,1,123.18018-32.47Z"
                                                    transform="translate(-154.35252 -77.40283)" fill="#3f3d56">
                                                </path>
                                                <path
                                                    d="M624.2595,268.86254c-.47244-4.968-6.55849-8.02647-11.3179-6.52583s-7.88411,6.2929-8.82863,11.19308a16.0571,16.0571,0,0,0,2.16528,12.12236c2.40572,3.46228,6.82664,5.623,10.95,4.74406,4.70707-1.00334,7.96817-5.59956,8.90127-10.32105s.00667-9.58929-.91854-14.31234Z"
                                                    transform="translate(-154.35252 -77.40283)" fill="#2f2e41">
                                                </path>
                                                <path
                                                    d="M691.24187,275.95964c-.47245-4.968-6.5585-8.02646-11.3179-6.52582s-7.88412,6.29289-8.82864,11.19307a16.05711,16.05711,0,0,0,2.16529,12.12236c2.40571,3.46228,6.82663,5.623,10.95,4.74406,4.70707-1.00334,7.96817-5.59955,8.90127-10.32105s.00667-9.58929-.91853-14.31234Z"
                                                    transform="translate(-154.35252 -77.40283)" fill="#2f2e41">
                                                </path>
                                                <path
                                                    d="M488.93638,356.14169a4.47525,4.47525,0,0,1-3.30664-1.46436L436.00767,300.544a6.02039,6.02039,0,0,0-4.42627-1.94727H169.3618a15.02615,15.02615,0,0,1-15.00928-15.00927V189.025a15.02615,15.02615,0,0,1,15.00928-15.00928H509.087A15.02615,15.02615,0,0,1,524.0963,189.025v94.5625A15.02615,15.02615,0,0,1,509.087,298.59676h-9.63135a6.01157,6.01157,0,0,0-6.00464,6.00489v47.0332a4.474,4.474,0,0,1-2.87011,4.1958A4.52563,4.52563,0,0,1,488.93638,356.14169Z"
                                                    transform="translate(-154.35252 -77.40283)" fill="currentColor">
                                                </path>
                                                <path
                                                    d="M488.93638,356.14169a4.47525,4.47525,0,0,1-3.30664-1.46436L436.00767,300.544a6.02039,6.02039,0,0,0-4.42627-1.94727H169.3618a15.02615,15.02615,0,0,1-15.00928-15.00927V189.025a15.02615,15.02615,0,0,1,15.00928-15.00928H509.087A15.02615,15.02615,0,0,1,524.0963,189.025v94.5625A15.02615,15.02615,0,0,1,509.087,298.59676h-9.63135a6.01157,6.01157,0,0,0-6.00464,6.00489v47.0332a4.474,4.474,0,0,1-2.87011,4.1958A4.52563,4.52563,0,0,1,488.93638,356.14169ZM169.3618,176.01571A13.024,13.024,0,0,0,156.35252,189.025v94.5625a13.024,13.024,0,0,0,13.00928,13.00927H431.5814a8.02436,8.02436,0,0,1,5.90039,2.59571l49.62208,54.1333a2.50253,2.50253,0,0,0,4.34716-1.69092v-47.0332a8.0137,8.0137,0,0,1,8.00464-8.00489H509.087a13.024,13.024,0,0,0,13.00928-13.00927V189.025A13.024,13.024,0,0,0,509.087,176.01571Z"
                                                    transform="translate(-154.35252 -77.40283)" fill="#3f3d56">
                                                </path>
                                                <circle cx="36.81601" cy="125.19345" r="13.13371" fill="#6c63ff">
                                                </circle>
                                                <path
                                                    d="M493.76439,275.26947H184.68447a7.00465,7.00465,0,1,1,0-14.00929H493.76439a7.00465,7.00465,0,0,1,0,14.00929Z"
                                                    transform="translate(-154.35252 -77.40283)"
                                                    :fill="$store.app.theme === 'dark' || $store.app.isDarkMode ?
                                                        '#888ea8' : '#e6e6e6'">
                                                </path>
                                                <path
                                                    d="M393.07263,245.49973H184.68447a7.00465,7.00465,0,1,1,0-14.00929H393.07263a7.00464,7.00464,0,0,1,0,14.00929Z"
                                                    transform="translate(-154.35252 -77.40283)"
                                                    :fill="$store.app.theme === 'dark' || $store.app.isDarkMode ?
                                                        '#888ea8' : '#e6e6e6'">
                                                </path>
                                                <path
                                                    d="M709.41908,676.83065a4.474,4.474,0,0,1-2.87011-4.1958v-47.0332a6.01157,6.01157,0,0,0-6.00464-6.00489H690.913a15.02615,15.02615,0,0,1-15.00928-15.00927V510.025A15.02615,15.02615,0,0,1,690.913,495.01571H1030.6382a15.02615,15.02615,0,0,1,15.00928,15.00928v94.5625a15.02615,15.02615,0,0,1-15.00928,15.00927H768.4186a6.02039,6.02039,0,0,0-4.42627,1.94727l-49.62207,54.1333a4.47525,4.47525,0,0,1-3.30664,1.46436A4.52563,4.52563,0,0,1,709.41908,676.83065Z"
                                                    transform="translate(-154.35252 -77.40283)" fill="currentColor">
                                                </path>
                                                <path
                                                    d="M709.41908,676.83065a4.474,4.474,0,0,1-2.87011-4.1958v-47.0332a6.01157,6.01157,0,0,0-6.00464-6.00489H690.913a15.02615,15.02615,0,0,1-15.00928-15.00927V510.025A15.02615,15.02615,0,0,1,690.913,495.01571H1030.6382a15.02615,15.02615,0,0,1,15.00928,15.00928v94.5625a15.02615,15.02615,0,0,1-15.00928,15.00927H768.4186a6.02039,6.02039,0,0,0-4.42627,1.94727l-49.62207,54.1333a4.47525,4.47525,0,0,1-3.30664,1.46436A4.52563,4.52563,0,0,1,709.41908,676.83065ZM690.913,497.01571A13.024,13.024,0,0,0,677.9037,510.025v94.5625A13.024,13.024,0,0,0,690.913,617.59676h9.63135a8.0137,8.0137,0,0,1,8.00464,8.00489v47.0332a2.50253,2.50253,0,0,0,4.34716,1.69092l49.62208-54.1333a8.02436,8.02436,0,0,1,5.90039-2.59571h262.2196a13.024,13.024,0,0,0,13.00928-13.00927V510.025a13.024,13.024,0,0,0-13.00928-13.00928Z"
                                                    transform="translate(-154.35252 -77.40283)" fill="#3f3d56">
                                                </path>
                                                <path
                                                    d="M603.53027,706.11319a89.06853,89.06853,0,0,1-93.65039,1.49,54.12885,54.12885,0,0,1,9.40039-12.65,53.43288,53.43288,0,0,1,83.90967,10.56994C603.2998,705.71316,603.41992,705.91318,603.53027,706.11319Z"
                                                    transform="translate(-154.35252 -77.40283)" fill="#6c63ff">
                                                </path>
                                                <circle cx="398.44256" cy="536.68841" r="44.20157" fill="#2f2e41">
                                                </circle>
                                                <circle cx="556.81859" cy="629.4886" r="32.89806"
                                                    transform="translate(-416.96496 738.72884) rotate(-61.33685)"
                                                    fill="#ffb8b8"></circle>
                                                <path
                                                    d="M522.25039,608.79582a44.74387,44.74387,0,0,0,25.57085,7.9025,27.41946,27.41946,0,0,1-10.8677,4.47107,90.22316,90.22316,0,0,0,36.85334.20707,23.852,23.852,0,0,0,7.71488-2.64973,9.76352,9.76352,0,0,0,4.762-6.36865c.80855-4.61909-2.7907-8.81563-6.53113-11.64387a48.17616,48.17616,0,0,0-40.4839-8.08981c-4.52231,1.169-9.05265,3.144-11.99,6.77579s-3.80746,9.23076-1.0089,12.97052Z"
                                                    transform="translate(-154.35252 -77.40283)" fill="#2f2e41">
                                                </path>
                                                <path
                                                    d="M555.5,721.17319a89.97205,89.97205,0,1,1,48.5708-14.21875A89.87958,89.87958,0,0,1,555.5,721.17319Zm0-178a88.00832,88.00832,0,1,0,88,88A88.09957,88.09957,0,0,0,555.5,543.17319Z"
                                                    transform="translate(-154.35252 -77.40283)" fill="#3f3d56">
                                                </path>
                                                <circle cx="563.81601" cy="445.19345" r="13.13371" fill="#6c63ff">
                                                </circle>
                                                <path
                                                    d="M1020.76439,595.26947H711.68447a7.00465,7.00465,0,1,1,0-14.00929h309.07992a7.00464,7.00464,0,0,1,0,14.00929Z"
                                                    transform="translate(-154.35252 -77.40283)"
                                                    :fill="$store.app.theme === 'dark' || $store.app.isDarkMode ?
                                                        '#888ea8' : '#e6e6e6'">
                                                </path>
                                                <path
                                                    d="M920.07263,565.49973H711.68447a7.00465,7.00465,0,1,1,0-14.00929H920.07263a7.00465,7.00465,0,0,1,0,14.00929Z"
                                                    transform="translate(-154.35252 -77.40283)"
                                                    :fill="$store.app.theme === 'dark' || $store.app.isDarkMode ?
                                                        '#888ea8' : '#e6e6e6'">
                                                </path>
                                                <ellipse cx="554.64354" cy="605.66091" rx="24.50394"
                                                    ry="2.71961"
                                                    :fill="$store.app.theme === 'dark' || $store.app.isDarkMode ?
                                                        '#888ea8' : '#e6e6e6'">
                                                </ellipse>
                                                <ellipse cx="335.64354" cy="285.66091" rx="24.50394"
                                                    ry="2.71961"
                                                    :fill="$store.app.theme === 'dark' || $store.app.isDarkMode ?
                                                        '#888ea8' : '#e6e6e6'">
                                                </ellipse>
                                            </svg>
                                        </div>
                                        <p
                                            class="mx-auto flex max-w-[190px] justify-center rounded-md bg-white-dark/20 p-2 font-semibold">
                                            <svg width="24" height="24" viewbox="0 0 24 24"
                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                class="h-5 w-5 ltr:mr-2 rtl:ml-2">
                                                <path
                                                    d="M13.0867 21.3877L13.7321 21.7697L13.0867 21.3877ZM13.6288 20.4718L12.9833 20.0898L13.6288 20.4718ZM10.3712 20.4718L9.72579 20.8539H9.72579L10.3712 20.4718ZM10.9133 21.3877L11.5587 21.0057L10.9133 21.3877ZM2.3806 15.9134L3.07351 15.6264V15.6264L2.3806 15.9134ZM7.78958 18.9915L7.77666 19.7413L7.78958 18.9915ZM5.08658 18.6194L4.79957 19.3123H4.79957L5.08658 18.6194ZM21.6194 15.9134L22.3123 16.2004V16.2004L21.6194 15.9134ZM16.2104 18.9915L16.1975 18.2416L16.2104 18.9915ZM18.9134 18.6194L19.2004 19.3123H19.2004L18.9134 18.6194ZM19.6125 2.7368L19.2206 3.37628L19.6125 2.7368ZM21.2632 4.38751L21.9027 3.99563V3.99563L21.2632 4.38751ZM4.38751 2.7368L3.99563 2.09732V2.09732L4.38751 2.7368ZM2.7368 4.38751L2.09732 3.99563H2.09732L2.7368 4.38751ZM9.40279 19.2098L9.77986 18.5615L9.77986 18.5615L9.40279 19.2098ZM13.7321 21.7697L14.2742 20.8539L12.9833 20.0898L12.4412 21.0057L13.7321 21.7697ZM9.72579 20.8539L10.2679 21.7697L11.5587 21.0057L11.0166 20.0898L9.72579 20.8539ZM12.4412 21.0057C12.2485 21.3313 11.7515 21.3313 11.5587 21.0057L10.2679 21.7697C11.0415 23.0767 12.9585 23.0767 13.7321 21.7697L12.4412 21.0057ZM10.5 2.75H13.5V1.25H10.5V2.75ZM21.25 10.5V11.5H22.75V10.5H21.25ZM2.75 11.5V10.5H1.25V11.5H2.75ZM1.25 11.5C1.25 12.6546 1.24959 13.5581 1.29931 14.2868C1.3495 15.0223 1.45323 15.6344 1.68769 16.2004L3.07351 15.6264C2.92737 15.2736 2.84081 14.8438 2.79584 14.1847C2.75041 13.5189 2.75 12.6751 2.75 11.5H1.25ZM7.8025 18.2416C6.54706 18.2199 5.88923 18.1401 5.37359 17.9265L4.79957 19.3123C5.60454 19.6457 6.52138 19.7197 7.77666 19.7413L7.8025 18.2416ZM1.68769 16.2004C2.27128 17.6093 3.39066 18.7287 4.79957 19.3123L5.3736 17.9265C4.33223 17.4951 3.50486 16.6678 3.07351 15.6264L1.68769 16.2004ZM21.25 11.5C21.25 12.6751 21.2496 13.5189 21.2042 14.1847C21.1592 14.8438 21.0726 15.2736 20.9265 15.6264L22.3123 16.2004C22.5468 15.6344 22.6505 15.0223 22.7007 14.2868C22.7504 13.5581 22.75 12.6546 22.75 11.5H21.25ZM16.2233 19.7413C17.4786 19.7197 18.3955 19.6457 19.2004 19.3123L18.6264 17.9265C18.1108 18.1401 17.4529 18.2199 16.1975 18.2416L16.2233 19.7413ZM20.9265 15.6264C20.4951 16.6678 19.6678 17.4951 18.6264 17.9265L19.2004 19.3123C20.6093 18.7287 21.7287 17.6093 22.3123 16.2004L20.9265 15.6264ZM13.5 2.75C15.1512 2.75 16.337 2.75079 17.2619 2.83873C18.1757 2.92561 18.7571 3.09223 19.2206 3.37628L20.0044 2.09732C19.2655 1.64457 18.4274 1.44279 17.4039 1.34547C16.3915 1.24921 15.1222 1.25 13.5 1.25V2.75ZM22.75 10.5C22.75 8.87781 22.7508 7.6085 22.6545 6.59611C22.5572 5.57256 22.3554 4.73445 21.9027 3.99563L20.6237 4.77938C20.9078 5.24291 21.0744 5.82434 21.1613 6.73809C21.2492 7.663 21.25 8.84876 21.25 10.5H22.75ZM19.2206 3.37628C19.7925 3.72672 20.2733 4.20752 20.6237 4.77938L21.9027 3.99563C21.4286 3.22194 20.7781 2.57144 20.0044 2.09732L19.2206 3.37628ZM10.5 1.25C8.87781 1.25 7.6085 1.24921 6.59611 1.34547C5.57256 1.44279 4.73445 1.64457 3.99563 2.09732L4.77938 3.37628C5.24291 3.09223 5.82434 2.92561 6.73809 2.83873C7.663 2.75079 8.84876 2.75 10.5 2.75V1.25ZM2.75 10.5C2.75 8.84876 2.75079 7.663 2.83873 6.73809C2.92561 5.82434 3.09223 5.24291 3.37628 4.77938L2.09732 3.99563C1.64457 4.73445 1.44279 5.57256 1.34547 6.59611C1.24921 7.6085 1.25 8.87781 1.25 10.5H2.75ZM3.99563 2.09732C3.22194 2.57144 2.57144 3.22194 2.09732 3.99563L3.37628 4.77938C3.72672 4.20752 4.20752 3.72672 4.77938 3.37628L3.99563 2.09732ZM11.0166 20.0898C10.8136 19.7468 10.6354 19.4441 10.4621 19.2063C10.2795 18.9559 10.0702 18.7304 9.77986 18.5615L9.02572 19.8582C9.07313 19.8857 9.13772 19.936 9.24985 20.0898C9.37122 20.2564 9.50835 20.4865 9.72579 20.8539L11.0166 20.0898ZM7.77666 19.7413C8.21575 19.7489 8.49387 19.7545 8.70588 19.7779C8.90399 19.7999 8.98078 19.832 9.02572 19.8582L9.77986 18.5615C9.4871 18.3912 9.18246 18.3215 8.87097 18.287C8.57339 18.2541 8.21375 18.2487 7.8025 18.2416L7.77666 19.7413ZM14.2742 20.8539C14.4916 20.4865 14.6287 20.2564 14.7501 20.0898C14.8622 19.936 14.9268 19.8857 14.9742 19.8582L14.2201 18.5615C13.9298 18.7304 13.7204 18.9559 13.5379 19.2063C13.3646 19.4441 13.1864 19.7468 12.9833 20.0898L14.2742 20.8539ZM16.1975 18.2416C15.7862 18.2487 15.4266 18.2541 15.129 18.287C14.8175 18.3215 14.5129 18.3912 14.2201 18.5615L14.9742 19.8582C15.0192 19.832 15.096 19.7999 15.2941 19.7779C15.5061 19.7545 15.7842 19.7489 16.2233 19.7413L16.1975 18.2416Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                            Click User To Chat
                                        </p>
                                    </div>
                                </div>
                            </template>
                            <template x-if="isShowUserChat && selectedUser">
                                <div class="relative h-full">
                                    <div class="flex items-center justify-between p-4">
                                        <div class="flex items-center space-x-2 rtl:space-x-reverse">
                                            <button type="button" class="hover:text-primary xl:hidden"
                                                @click="isShowChatMenu = !isShowChatMenu">
                                                <svg width="24" height="24" viewbox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="h-6 w-6">
                                                    <path d="M20 7L4 7" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round"></path>
                                                    <path opacity="0.5" d="M20 12L4 12" stroke="currentColor"
                                                        stroke-width="1.5" stroke-linecap="round"></path>
                                                    <path d="M20 17L4 17" stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round"></path>
                                                </svg>
                                            </button>
                                            <div class="relative flex-none">
                                                <img :src="`assets/images/${selectedUser.path}`"
                                                    class="h-10 w-10 rounded-full object-cover sm:h-12 sm:w-12">
                                                <div class="absolute bottom-0 ltr:right-0 rtl:left-0">
                                                    <div class="h-4 w-4 rounded-full bg-success"></div>
                                                </div>
                                            </div>
                                            <div class="mx-3">
                                                <p class="font-semibold" x-text="selectedUser.name"></p>
                                                <p class="text-xs text-white-dark"
                                                    x-text="selectedUser.active ? 'Active now' : 'Last seen at '+selectedUser.time">
                                                </p>
                                            </div>
                                        </div>
                                        <div class="flex gap-3 sm:gap-5">
                                            <button type="button">
                                                <svg width="24" height="24" viewbox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 hover:text-primary">
                                                    <path
                                                        d="M13.5 2C13.5 2 15.8335 2.21213 18.8033 5.18198C21.7731 8.15183 21.9853 10.4853 21.9853 10.4853"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round"></path>
                                                    <path
                                                        d="M14.207 5.53564C14.207 5.53564 15.197 5.81849 16.6819 7.30341C18.1668 8.78834 18.4497 9.77829 18.4497 9.77829"
                                                        stroke="currentColor" stroke-width="1.5"
                                                        stroke-linecap="round"></path>
                                                    <path opacity="0.5"
                                                        d="M15.1007 15.0272L14.5569 14.5107L15.1007 15.0272ZM15.5562 14.5477L16.1 15.0642H16.1L15.5562 14.5477ZM17.9728 14.2123L17.5987 14.8623H17.5987L17.9728 14.2123ZM19.8833 15.312L19.5092 15.962L19.8833 15.312ZM20.4217 18.7584L20.9655 19.2749L20.4217 18.7584ZM19.0011 20.254L18.4573 19.7375L19.0011 20.254ZM17.6763 20.9631L17.7499 21.7095L17.6763 20.9631ZM7.81536 16.4752L8.35915 15.9587L7.81536 16.4752ZM3.00289 6.96594L2.25397 7.00613L2.25397 7.00613L3.00289 6.96594ZM9.47752 8.50311L10.0213 9.01963H10.0213L9.47752 8.50311ZM9.63424 5.6931L10.2466 5.26012L9.63424 5.6931ZM8.37326 3.90961L7.76086 4.3426V4.3426L8.37326 3.90961ZM5.26145 3.60864L5.80524 4.12516L5.26145 3.60864ZM3.69185 5.26114L3.14806 4.74462L3.14806 4.74462L3.69185 5.26114ZM11.0631 13.0559L11.6069 12.5394L11.0631 13.0559ZM15.6445 15.5437L16.1 15.0642L15.0124 14.0312L14.5569 14.5107L15.6445 15.5437ZM17.5987 14.8623L19.5092 15.962L20.2575 14.662L18.347 13.5623L17.5987 14.8623ZM19.8779 18.2419L18.4573 19.7375L19.5449 20.7705L20.9655 19.2749L19.8779 18.2419ZM17.6026 20.2167C16.1676 20.3584 12.4233 20.2375 8.35915 15.9587L7.27157 16.9917C11.7009 21.655 15.9261 21.8895 17.7499 21.7095L17.6026 20.2167ZM8.35915 15.9587C4.48303 11.8778 3.83285 8.43556 3.75181 6.92574L2.25397 7.00613C2.35322 8.85536 3.1384 12.6403 7.27157 16.9917L8.35915 15.9587ZM9.7345 9.32159L10.0213 9.01963L8.93372 7.9866L8.64691 8.28856L9.7345 9.32159ZM10.2466 5.26012L8.98565 3.47663L7.76086 4.3426L9.02185 6.12608L10.2466 5.26012ZM4.71766 3.09213L3.14806 4.74462L4.23564 5.77765L5.80524 4.12516L4.71766 3.09213ZM9.1907 8.80507C8.64691 8.28856 8.64622 8.28929 8.64552 8.29002C8.64528 8.29028 8.64458 8.29102 8.64411 8.29152C8.64316 8.29254 8.64219 8.29357 8.64121 8.29463C8.63924 8.29675 8.6372 8.29896 8.6351 8.30127C8.63091 8.30588 8.62646 8.31087 8.62178 8.31625C8.61243 8.32701 8.60215 8.33931 8.59116 8.3532C8.56918 8.38098 8.54431 8.41512 8.51822 8.45588C8.46591 8.53764 8.40917 8.64531 8.36112 8.78033C8.26342 9.0549 8.21018 9.4185 8.27671 9.87257C8.40742 10.7647 8.99198 11.9644 10.5193 13.5724L11.6069 12.5394C10.1793 11.0363 9.82761 10.1106 9.76086 9.65511C9.72866 9.43536 9.76138 9.31957 9.77432 9.28321C9.78159 9.26277 9.78635 9.25709 9.78169 9.26437C9.77944 9.26789 9.77494 9.27451 9.76738 9.28407C9.76359 9.28885 9.75904 9.29437 9.7536 9.30063C9.75088 9.30375 9.74793 9.30706 9.74476 9.31056C9.74317 9.31231 9.74152 9.3141 9.73981 9.31594C9.73896 9.31686 9.73809 9.31779 9.7372 9.31873C9.73676 9.3192 9.73608 9.31992 9.73586 9.32015C9.73518 9.32087 9.7345 9.32159 9.1907 8.80507ZM10.5193 13.5724C12.0422 15.1757 13.1923 15.806 14.0698 15.9485C14.5201 16.0216 14.8846 15.9632 15.1606 15.8544C15.2955 15.8012 15.4022 15.7387 15.4823 15.6819C15.5223 15.6535 15.5556 15.6266 15.5824 15.6031C15.5959 15.5913 15.6077 15.5803 15.618 15.5703C15.6232 15.5654 15.628 15.5606 15.6324 15.5562C15.6346 15.554 15.6367 15.5518 15.6387 15.5497C15.6397 15.5487 15.6407 15.5477 15.6417 15.5467C15.6422 15.5462 15.6429 15.5454 15.6431 15.5452C15.6438 15.5444 15.6445 15.5437 15.1007 15.0272C14.5569 14.5107 14.5576 14.51 14.5583 14.5093C14.5585 14.509 14.5592 14.5083 14.5596 14.5078C14.5605 14.5069 14.5614 14.506 14.5623 14.5051C14.5641 14.5033 14.5658 14.5015 14.5674 14.4998C14.5708 14.4965 14.574 14.4933 14.577 14.4904C14.583 14.4846 14.5885 14.4796 14.5933 14.4754C14.6028 14.467 14.6099 14.4616 14.6145 14.4584C14.6239 14.4517 14.6229 14.454 14.6102 14.459C14.5909 14.4666 14.5 14.4987 14.3103 14.4679C13.9077 14.4025 13.0391 14.0472 11.6069 12.5394L10.5193 13.5724ZM8.98565 3.47663C7.97206 2.04305 5.94384 1.80119 4.71766 3.09213L5.80524 4.12516C6.32808 3.57471 7.24851 3.61795 7.76086 4.3426L8.98565 3.47663ZM3.75181 6.92574C3.73038 6.52644 3.90425 6.12654 4.23564 5.77765L3.14806 4.74462C2.61221 5.30877 2.20493 6.09246 2.25397 7.00613L3.75181 6.92574ZM18.4573 19.7375C18.1783 20.0313 17.8864 20.1887 17.6026 20.2167L17.7499 21.7095C18.497 21.6357 19.1016 21.2373 19.5449 20.7705L18.4573 19.7375ZM10.0213 9.01963C10.9889 8.00095 11.0574 6.40678 10.2466 5.26012L9.02185 6.12608C9.44399 6.72315 9.37926 7.51753 8.93372 7.9866L10.0213 9.01963ZM19.5092 15.962C20.33 16.4345 20.4907 17.5968 19.8779 18.2419L20.9655 19.2749C22.2704 17.901 21.8904 15.6019 20.2575 14.662L19.5092 15.962ZM16.1 15.0642C16.4854 14.6584 17.086 14.5672 17.5987 14.8623L18.347 13.5623C17.2485 12.93 15.8861 13.1113 15.0124 14.0312L16.1 15.0642Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </button>

                                            <button type="button">
                                                <svg width="24" height="24" viewbox="0 0 24 24"
                                                    fill="none" xmlns="http://www.w3.org/2000/svg"
                                                    class="h-5 w-5 hover:text-primary">
                                                    <path
                                                        d="M2 11.5C2 8.21252 2 6.56878 2.90796 5.46243C3.07418 5.25989 3.25989 5.07418 3.46243 4.90796C4.56878 4 6.21252 4 9.5 4C12.7875 4 14.4312 4 15.5376 4.90796C15.7401 5.07418 15.9258 5.25989 16.092 5.46243C17 6.56878 17 8.21252 17 11.5V12.5C17 15.7875 17 17.4312 16.092 18.5376C15.9258 18.7401 15.7401 18.9258 15.5376 19.092C14.4312 20 12.7875 20 9.5 20C6.21252 20 4.56878 20 3.46243 19.092C3.25989 18.9258 3.07418 18.7401 2.90796 18.5376C2 17.4312 2 15.7875 2 12.5V11.5Z"
                                                        stroke="currentColor" stroke-width="1.5"></path>
                                                    <path opacity="0.5"
                                                        d="M17 9.50019L17.6584 9.17101C19.6042 8.19807 20.5772 7.7116 21.2886 8.15127C22 8.59094 22 9.67872 22 11.8543V12.1461C22 14.3217 22 15.4094 21.2886 15.8491C20.5772 16.2888 19.6042 15.8023 17.6584 14.8294L17 14.5002V9.50019Z"
                                                        stroke="currentColor" stroke-width="1.5"></path>
                                                </svg>
                                            </button>

                                            <div x-data="dropdown" @click.outside="open = false"
                                                class="dropdown">
                                                <button type="button"
                                                    class="flex h-8 w-8 items-center justify-center rounded-full bg-[#f4f4f4] hover:bg-primary-light hover:text-primary dark:bg-[#1b2e4b]"
                                                    @click="toggle">
                                                    <svg width="24" height="24" viewbox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 rotate-90 opacity-70 hover:text-primary">
                                                        <circle cx="5" cy="12" r="2"
                                                            stroke="currentColor" stroke-width="1.5"></circle>
                                                        <circle opacity="0.5" cx="12" cy="12" r="2"
                                                            stroke="currentColor" stroke-width="1.5"></circle>
                                                        <circle cx="19" cy="12" r="2"
                                                            stroke="currentColor" stroke-width="1.5"></circle>
                                                    </svg>
                                                </button>
                                                <ul x-cloak="" x-show="open" x-transition=""
                                                    x-transition.duration.300ms="" class="ltr:right-0 rtl:left-0">
                                                    <li>
                                                        <a href="javascript:;" @click="toggle">
                                                            <svg width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4 w-4 shrink-0 ltr:mr-2 rtl:ml-2">
                                                                <circle cx="11.5" cy="11.5" r="9.5"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    opacity="0.5"></circle>
                                                                <path d="M18.5 18.5L22 22" stroke="currentColor"
                                                                    stroke-width="1.5" stroke-linecap="round">
                                                                </path>
                                                            </svg>
                                                            Search
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" @click="toggle">
                                                            <svg width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2">
                                                                <path
                                                                    d="M6 11C6 8.17157 6 6.75736 6.87868 5.87868C7.75736 5 9.17157 5 12 5H15C17.8284 5 19.2426 5 20.1213 5.87868C21 6.75736 21 8.17157 21 11V16C21 18.8284 21 20.2426 20.1213 21.1213C19.2426 22 17.8284 22 15 22H12C9.17157 22 7.75736 22 6.87868 21.1213C6 20.2426 6 18.8284 6 16V11Z"
                                                                    stroke="currentColor" stroke-width="1.5"></path>
                                                                <path opacity="0.5"
                                                                    d="M6 19C4.34315 19 3 17.6569 3 16V10C3 6.22876 3 4.34315 4.17157 3.17157C5.34315 2 7.22876 2 11 2H15C16.6569 2 18 3.34315 18 5"
                                                                    stroke="currentColor" stroke-width="1.5"></path>
                                                            </svg>
                                                            Copy
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" @click="toggle">
                                                            <svg width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2">
                                                                <path opacity="0.5"
                                                                    d="M9.17065 4C9.58249 2.83481 10.6937 2 11.9999 2C13.3062 2 14.4174 2.83481 14.8292 4"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round"></path>
                                                                <path d="M20.5001 6H3.5" stroke="currentColor"
                                                                    stroke-width="1.5" stroke-linecap="round">
                                                                </path>
                                                                <path
                                                                    d="M18.8334 8.5L18.3735 15.3991C18.1965 18.054 18.108 19.3815 17.243 20.1907C16.378 21 15.0476 21 12.3868 21H11.6134C8.9526 21 7.6222 21 6.75719 20.1907C5.89218 19.3815 5.80368 18.054 5.62669 15.3991L5.16675 8.5"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round"></path>
                                                                <path opacity="0.5" d="M9.5 11L10 16"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round"></path>
                                                                <path opacity="0.5" d="M14.5 11L14 16"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round"></path>
                                                            </svg>
                                                            Delete
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" @click="toggle">
                                                            <svg width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2">
                                                                <path
                                                                    d="M9 11.5C9 12.8807 7.88071 14 6.5 14C5.11929 14 4 12.8807 4 11.5C4 10.1193 5.11929 9 6.5 9C7.88071 9 9 10.1193 9 11.5Z"
                                                                    stroke="currentColor" stroke-width="1.5"></path>
                                                                <path opacity="0.5" d="M14.3206 16.8017L9 13.29"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round"></path>
                                                                <path opacity="0.5"
                                                                    d="M14.4207 6.83984L9.1001 10.3515"
                                                                    stroke="currentColor" stroke-width="1.5"
                                                                    stroke-linecap="round"></path>
                                                                <path
                                                                    d="M19 18.5C19 19.8807 17.8807 21 16.5 21C15.1193 21 14 19.8807 14 18.5C14 17.1193 15.1193 16 16.5 16C17.8807 16 19 17.1193 19 18.5Z"
                                                                    stroke="currentColor" stroke-width="1.5"></path>
                                                                <path
                                                                    d="M19 5.5C19 6.88071 17.8807 8 16.5 8C15.1193 8 14 6.88071 14 5.5C14 4.11929 15.1193 3 16.5 3C17.8807 3 19 4.11929 19 5.5Z"
                                                                    stroke="currentColor" stroke-width="1.5"></path>
                                                            </svg>
                                                            Share
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="javascript:;" @click="toggle">
                                                            <svg width="24" height="24" viewbox="0 0 24 24"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg"
                                                                class="h-4.5 w-4.5 shrink-0 ltr:mr-2 rtl:ml-2">
                                                                <circle cx="12" cy="12" r="3"
                                                                    stroke="currentColor" stroke-width="1.5">
                                                                </circle>
                                                                <path opacity="0.5"
                                                                    d="M13.7654 2.15224C13.3978 2 12.9319 2 12 2C11.0681 2 10.6022 2 10.2346 2.15224C9.74457 2.35523 9.35522 2.74458 9.15223 3.23463C9.05957 3.45834 9.0233 3.7185 9.00911 4.09799C8.98826 4.65568 8.70226 5.17189 8.21894 5.45093C7.73564 5.72996 7.14559 5.71954 6.65219 5.45876C6.31645 5.2813 6.07301 5.18262 5.83294 5.15102C5.30704 5.08178 4.77518 5.22429 4.35436 5.5472C4.03874 5.78938 3.80577 6.1929 3.33983 6.99993C2.87389 7.80697 2.64092 8.21048 2.58899 8.60491C2.51976 9.1308 2.66227 9.66266 2.98518 10.0835C3.13256 10.2756 3.3397 10.437 3.66119 10.639C4.1338 10.936 4.43789 11.4419 4.43786 12C4.43783 12.5581 4.13375 13.0639 3.66118 13.3608C3.33965 13.5629 3.13248 13.7244 2.98508 13.9165C2.66217 14.3373 2.51966 14.8691 2.5889 15.395C2.64082 15.7894 2.87379 16.193 3.33973 17C3.80568 17.807 4.03865 18.2106 4.35426 18.4527C4.77508 18.7756 5.30694 18.9181 5.83284 18.8489C6.07289 18.8173 6.31632 18.7186 6.65204 18.5412C7.14547 18.2804 7.73556 18.27 8.2189 18.549C8.70224 18.8281 8.98826 19.3443 9.00911 19.9021C9.02331 20.2815 9.05957 20.5417 9.15223 20.7654C9.35522 21.2554 9.74457 21.6448 10.2346 21.8478C10.6022 22 11.0681 22 12 22C12.9319 22 13.3978 22 13.7654 21.8478C14.2554 21.6448 14.6448 21.2554 14.8477 20.7654C14.9404 20.5417 14.9767 20.2815 14.9909 19.902C15.0117 19.3443 15.2977 18.8281 15.781 18.549C16.2643 18.2699 16.8544 18.2804 17.3479 18.5412C17.6836 18.7186 17.927 18.8172 18.167 18.8488C18.6929 18.9181 19.2248 18.7756 19.6456 18.4527C19.9612 18.2105 20.1942 17.807 20.6601 16.9999C21.1261 16.1929 21.3591 15.7894 21.411 15.395C21.4802 14.8691 21.3377 14.3372 21.0148 13.9164C20.8674 13.7243 20.6602 13.5628 20.3387 13.3608C19.8662 13.0639 19.5621 12.558 19.5621 11.9999C19.5621 11.4418 19.8662 10.9361 20.3387 10.6392C20.6603 10.4371 20.8675 10.2757 21.0149 10.0835C21.3378 9.66273 21.4803 9.13087 21.4111 8.60497C21.3592 8.21055 21.1262 7.80703 20.6602 7C20.1943 6.19297 19.9613 5.78945 19.6457 5.54727C19.2249 5.22436 18.693 5.08185 18.1671 5.15109C17.9271 5.18269 17.6837 5.28136 17.3479 5.4588C16.8545 5.71959 16.2644 5.73002 15.7811 5.45096C15.2977 5.17191 15.0117 4.65566 14.9909 4.09794C14.9767 3.71848 14.9404 3.45833 14.8477 3.23463C14.6448 2.74458 14.2554 2.35523 13.7654 2.15224Z"
                                                                    stroke="currentColor" stroke-width="1.5"></path>
                                                            </svg>
                                                            Settings
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="h-px w-full border-b border-[#e0e6ed] dark:border-[#1b2e4b]"></div>
                                    <div
                                        class="perfect-scrollbar relative h-full overflow-auto sm:h-[calc(100vh_-_300px)]">
                                        <div
                                            class="chat-conversation-box min-h-[400px] space-y-5 p-4 pb-[68px] sm:min-h-[300px] sm:pb-0">
                                            <div class="m-6 mt-0 block">
                                                <h4
                                                    class="relative border-b border-[#f4f4f4] text-center text-xs dark:border-gray-800">
                                                    <span class="relative top-2 bg-white px-3 dark:bg-[#0e1726]"
                                                        x-text="'Today, ' + selectedUser.time"></span>
                                                </h4>
                                            </div>
                                            <template x-for="message in selectedUser.messages">
                                                <div class="flex items-start gap-3"
                                                    :class="{ 'justify-end': selectedUser.userId === message.fromUserId }">
                                                    <div class="flex-none"
                                                        :class="{ 'order-2': selectedUser.userId === message.fromUserId }">
                                                        <template x-if="selectedUser.userId === message.fromUserId">
                                                            <img :src="`assets/images/${loginUser.path}`"
                                                                class="h-10 w-10 rounded-full object-cover">
                                                        </template>
                                                        <template x-if="selectedUser.userId !== message.fromUserId">
                                                            <img :src="`assets/images/${selectedUser.path}`"
                                                                class="h-10 w-10 rounded-full object-cover">
                                                        </template>
                                                    </div>
                                                    <div class="space-y-2">
                                                        <div class="flex items-center gap-3">
                                                            <div class="rounded-md bg-black/10 p-4 py-2 dark:bg-gray-800"
                                                                :class="message.fromUserId == selectedUser.userId ?
                                                                    'ltr:rounded-br-none rtl:rounded-bl-none !bg-primary text-white' :
                                                                    'ltr:rounded-bl-none rtl:rounded-br-none'"
                                                                x-text="message.text"></div>
                                                            <div
                                                                :class="{ 'hidden': selectedUser.userId === message.fromUserId }">
                                                                <svg width="24" height="24"
                                                                    viewbox="0 0 24 24" fill="none"
                                                                    xmlns="http://www.w3.org/2000/svg"
                                                                    class="h-5 w-5 hover:text-primary">
                                                                    <circle opacity="0.5" cx="12"
                                                                        cy="12" r="10" stroke="currentColor"
                                                                        stroke-width="1.5"></circle>
                                                                    <path
                                                                        d="M9 16C9.85038 16.6303 10.8846 17 12 17C13.1154 17 14.1496 16.6303 15 16"
                                                                        stroke="currentColor" stroke-width="1.5"
                                                                        stroke-linecap="round"></path>
                                                                    <path
                                                                        d="M16 10.5C16 11.3284 15.5523 12 15 12C14.4477 12 14 11.3284 14 10.5C14 9.67157 14.4477 9 15 9C15.5523 9 16 9.67157 16 10.5Z"
                                                                        fill="currentColor"></path>
                                                                    <ellipse cx="9" cy="10.5"
                                                                        rx="1" ry="1.5"
                                                                        fill="currentColor"></ellipse>
                                                                </svg>
                                                            </div>
                                                        </div>
                                                        <div class="text-xs text-white-dark"
                                                            :class="{ 'ltr:text-right rtl:text-left': selectedUser.userId ===
                                                                    message.fromUserId }"
                                                            x-text="message.time ? message.time: '5h ago'"></div>
                                                    </div>
                                                </div>
                                            </template>
                                        </div>
                                    </div>
                                    <div class="absolute bottom-0 left-0 w-full p-4">
                                        <div class="w-full items-center space-x-3 rtl:space-x-reverse sm:flex">
                                            <div class="relative flex-1">
                                                <input id=""
                                                    class="form-input rounded-full border-0 bg-[#f4f4f4] px-12 py-2 focus:outline-none"
                                                    placeholder="Type a message" x-model="textMessage"
                                                    @keyup.enter="sendMessage()">
                                                <button type="button"
                                                    class="absolute top-1/2 -translate-y-1/2 hover:text-primary ltr:left-4 rtl:right-4">
                                                    <svg width="24" height="24" viewbox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5">
                                                        <circle opacity="0.5" cx="12" cy="12"
                                                            r="10" stroke="currentColor" stroke-width="1.5">
                                                        </circle>
                                                        <path
                                                            d="M9 16C9.85038 16.6303 10.8846 17 12 17C13.1154 17 14.1496 16.6303 15 16"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"></path>
                                                        <path
                                                            d="M16 10.5C16 11.3284 15.5523 12 15 12C14.4477 12 14 11.3284 14 10.5C14 9.67157 14.4477 9 15 9C15.5523 9 16 9.67157 16 10.5Z"
                                                            fill="currentColor"></path>
                                                        <ellipse cx="9" cy="10.5" rx="1"
                                                            ry="1.5" fill="currentColor"></ellipse>
                                                    </svg>
                                                </button>
                                                <button type="button"
                                                    class="absolute top-1/2 -translate-y-1/2 hover:text-primary ltr:right-4 rtl:left-4"
                                                    @click="sendMessage()">
                                                    <svg width="24" height="24" viewbox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5">
                                                        <path
                                                            d="M17.4975 18.4851L20.6281 9.09373C21.8764 5.34874 22.5006 3.47624 21.5122 2.48782C20.5237 1.49939 18.6511 2.12356 14.906 3.37189L5.57477 6.48218C3.49295 7.1761 2.45203 7.52305 2.13608 8.28637C2.06182 8.46577 2.01692 8.65596 2.00311 8.84963C1.94433 9.67365 2.72018 10.4495 4.27188 12.0011L4.55451 12.2837C4.80921 12.5384 4.93655 12.6658 5.03282 12.8075C5.22269 13.0871 5.33046 13.4143 5.34393 13.7519C5.35076 13.9232 5.32403 14.1013 5.27057 14.4574C5.07488 15.7612 4.97703 16.4131 5.0923 16.9147C5.32205 17.9146 6.09599 18.6995 7.09257 18.9433C7.59255 19.0656 8.24576 18.977 9.5522 18.7997L9.62363 18.79C9.99191 18.74 10.1761 18.715 10.3529 18.7257C10.6738 18.745 10.9838 18.8496 11.251 19.0285C11.3981 19.1271 11.5295 19.2585 11.7923 19.5213L12.0436 19.7725C13.5539 21.2828 14.309 22.0379 15.1101 21.9985C15.3309 21.9877 15.5479 21.9365 15.7503 21.8474C16.4844 21.5244 16.8221 20.5113 17.4975 18.4851Z"
                                                            stroke="currentColor" stroke-width="1.5"></path>
                                                        <path opacity="0.5" d="M6 18L21 3" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"></path>
                                                    </svg>
                                                </button>
                                            </div>
                                            <div
                                                class="hidden items-center space-x-3 py-3 rtl:space-x-reverse sm:block sm:py-0">
                                                <button type="button"
                                                    class="rounded-md bg-[#f4f4f4] p-2 hover:bg-primary-light hover:text-primary dark:bg-[#1b2e4b]">
                                                    <svg width="24" height="24" viewbox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5">
                                                        <path
                                                            d="M7 8C7 5.23858 9.23858 3 12 3C14.7614 3 17 5.23858 17 8V11C17 13.7614 14.7614 16 12 16C9.23858 16 7 13.7614 7 11V8Z"
                                                            stroke="currentColor" stroke-width="1.5"></path>
                                                        <path opacity="0.5" d="M13.5 8L17 8" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path opacity="0.5" d="M13.5 11L17 11"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"></path>
                                                        <path opacity="0.5" d="M7 8L9 8" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path opacity="0.5" d="M7 11L9 11" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"></path>
                                                        <path opacity="0.5"
                                                            d="M20 10V11C20 15.4183 16.4183 19 12 19M4 10V11C4 15.4183 7.58172 19 12 19M12 19V22"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"></path>
                                                        <path d="M22 2L2 22" stroke="currentColor"
                                                            stroke-width="1.5" stroke-linecap="round"></path>
                                                    </svg>
                                                </button>
                                                <button type="button"
                                                    class="rounded-md bg-[#f4f4f4] p-2 hover:bg-primary-light hover:text-primary dark:bg-[#1b2e4b]">
                                                    <svg width="24" height="24" viewbox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5">
                                                        <path opacity="0.5"
                                                            d="M17 9.00195C19.175 9.01406 20.3529 9.11051 21.1213 9.8789C22 10.7576 22 12.1718 22 15.0002V16.0002C22 18.8286 22 20.2429 21.1213 21.1215C20.2426 22.0002 18.8284 22.0002 16 22.0002H8C5.17157 22.0002 3.75736 22.0002 2.87868 21.1215C2 20.2429 2 18.8286 2 16.0002L2 15.0002C2 12.1718 2 10.7576 2.87868 9.87889C3.64706 9.11051 4.82497 9.01406 7 9.00195"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"></path>
                                                        <path d="M12 2L12 15M12 15L9 11.5M12 15L15 11.5"
                                                            stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round" stroke-linejoin="round"></path>
                                                    </svg>
                                                </button>
                                                <button type="button"
                                                    class="rounded-md bg-[#f4f4f4] p-2 hover:bg-primary-light hover:text-primary dark:bg-[#1b2e4b]">
                                                    <svg width="24" height="24" viewbox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5">
                                                        <circle cx="12" cy="13" r="3"
                                                            stroke="currentColor" stroke-width="1.5"></circle>
                                                        <path opacity="0.5"
                                                            d="M9.77778 21H14.2222C17.3433 21 18.9038 21 20.0248 20.2646C20.51 19.9462 20.9267 19.5371 21.251 19.0607C22 17.9601 22 16.4279 22 13.3636C22 10.2994 22 8.76721 21.251 7.6666C20.9267 7.19014 20.51 6.78104 20.0248 6.46268C19.3044 5.99013 18.4027 5.82123 17.022 5.76086C16.3631 5.76086 15.7959 5.27068 15.6667 4.63636C15.4728 3.68489 14.6219 3 13.6337 3H10.3663C9.37805 3 8.52715 3.68489 8.33333 4.63636C8.20412 5.27068 7.63685 5.76086 6.978 5.76086C5.59733 5.82123 4.69555 5.99013 3.97524 6.46268C3.48995 6.78104 3.07328 7.19014 2.74902 7.6666C2 8.76721 2 10.2994 2 13.3636C2 16.4279 2 17.9601 2.74902 19.0607C3.07328 19.5371 3.48995 19.9462 3.97524 20.2646C5.09624 21 6.65675 21 9.77778 21Z"
                                                            stroke="currentColor" stroke-width="1.5"></path>
                                                        <path d="M19 10H18" stroke="currentColor" stroke-width="1.5"
                                                            stroke-linecap="round"></path>
                                                    </svg>
                                                </button>
                                                <button type="button"
                                                    class="rounded-md bg-[#f4f4f4] p-2 hover:bg-primary-light hover:text-primary dark:bg-[#1b2e4b]">
                                                    <svg width="24" height="24" viewbox="0 0 24 24"
                                                        fill="none" xmlns="http://www.w3.org/2000/svg"
                                                        class="h-5 w-5 opacity-70">
                                                        <circle cx="5" cy="12" r="2"
                                                            stroke="currentColor" stroke-width="1.5"></circle>
                                                        <circle opacity="0.5" cx="12" cy="12" r="2"
                                                            stroke="currentColor" stroke-width="1.5"></circle>
                                                        <circle cx="19" cy="12" r="2"
                                                            stroke="currentColor" stroke-width="1.5"></circle>
                                                    </svg>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
                <!-- end main content section -->

            </div>

            <!-- start footer section -->
            <div class="p-6 pt-0 mt-auto text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                © <span id="footer-year">2022</span>. StarCode Kh All rights reserved.
            </div>
            <!-- end footer section -->
        </div>
    </div>

    <script src="assets/js/alpine-collaspe.min.js"></script>
    <script src="assets/js/alpine-persist.min.js"></script>
    <script defer="" src="assets/js/alpine-ui.min.js"></script>
    <script defer="" src="assets/js/alpine-focus.min.js"></script>
    <script defer="" src="assets/js/alpine.min.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        document.addEventListener('alpine:init', () => {
            // main section
            Alpine.data('scrollToTop', () => ({
                showTopButton: false,
                init() {
                    window.onscroll = () => {
                        this.scrollFunction();
                    };
                },

                scrollFunction() {
                    if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                        this.showTopButton = true;
                    } else {
                        this.showTopButton = false;
                    }
                },

                goToTop() {
                    document.body.scrollTop = 0;
                    document.documentElement.scrollTop = 0;
                },
            }));

            // theme customization
            Alpine.data('customizer', () => ({
                showCustomizer: false,
            }));

            // sidebar section
            Alpine.data('sidebar', () => ({
                init() {
                    const selector = document.querySelector('.sidebar ul a[href="' + window.location
                        .pathname + '"]');
                    if (selector) {
                        selector.classList.add('active');
                        const ul = selector.closest('ul.sub-menu');
                        if (ul) {
                            let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                            if (ele) {
                                ele = ele[0];
                                setTimeout(() => {
                                    ele.click();
                                });
                            }
                        }
                    }
                },
            }));

            // header section
            Alpine.data('header', () => ({
                init() {
                    const selector = document.querySelector('ul.horizontal-menu a[href="' + window
                        .location.pathname + '"]');
                    if (selector) {
                        selector.classList.add('active');
                        const ul = selector.closest('ul.sub-menu');
                        if (ul) {
                            let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                            if (ele) {
                                ele = ele[0];
                                setTimeout(() => {
                                    ele.classList.add('active');
                                });
                            }
                        }
                    }
                },

                notifications: [{
                        id: 1,
                        profile: 'user-profile.jpeg',
                        message: '<strong class="text-sm mr-1">StarCode Kh</strong>invite you to <strong>Prototyping</strong>',
                        time: '45 min ago',
                    },
                    {
                        id: 2,
                        profile: 'profile-34.jpeg',
                        message: '<strong class="text-sm mr-1">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong>',
                        time: '9h Ago',
                    },
                    {
                        id: 3,
                        profile: 'profile-16.jpeg',
                        message: '<strong class="text-sm mr-1">Anna Morgan</strong>Upload a file',
                        time: '9h Ago',
                    },
                ],

                messages: [{
                        id: 1,
                        image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                        title: 'Congratulations!',
                        message: 'Your OS has been updated.',
                        time: '1hr',
                    },
                    {
                        id: 2,
                        image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                        title: 'Did you know?',
                        message: 'You can switch between artboards.',
                        time: '2hr',
                    },
                    {
                        id: 3,
                        image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                        title: 'Something went wrong!',
                        message: 'Send Reposrt',
                        time: '2days',
                    },
                    {
                        id: 4,
                        image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                        title: 'Warning',
                        message: 'Your password strength is low.',
                        time: '5days',
                    },
                ],

                languages: [{
                        id: 1,
                        key: 'Khmer',
                        value: 'kh',
                    },
                    {
                        id: 2,
                        key: 'Danish',
                        value: 'da',
                    },
                    {
                        id: 3,
                        key: 'English',
                        value: 'en',
                    },
                    {
                        id: 4,
                        key: 'French',
                        value: 'fr',
                    },
                    {
                        id: 5,
                        key: 'German',
                        value: 'de',
                    },
                    {
                        id: 6,
                        key: 'Greek',
                        value: 'el',
                    },
                    {
                        id: 7,
                        key: 'Hungarian',
                        value: 'hu',
                    },
                    {
                        id: 8,
                        key: 'Italian',
                        value: 'it',
                    },
                    {
                        id: 9,
                        key: 'Japanese',
                        value: 'ja',
                    },
                    {
                        id: 10,
                        key: 'Polish',
                        value: 'pl',
                    },
                    {
                        id: 11,
                        key: 'Portuguese',
                        value: 'pt',
                    },
                    {
                        id: 12,
                        key: 'Russian',
                        value: 'ru',
                    },
                    {
                        id: 13,
                        key: 'Spanish',
                        value: 'es',
                    },
                    {
                        id: 14,
                        key: 'Swedish',
                        value: 'sv',
                    },
                    {
                        id: 15,
                        key: 'Turkish',
                        value: 'tr',
                    },
                    {
                        id: 16,
                        key: 'Arabic',
                        value: 'ae',
                    },
                ],

                removeNotification(value) {
                    this.notifications = this.notifications.filter((d) => d.id !== value);
                },

                removeMessage(value) {
                    this.messages = this.messages.filter((d) => d.id !== value);
                },
            }));
            //chat
            Alpine.data('chat', () => ({
                isShowUserChat: false,
                isShowChatMenu: false,
                loginUser: {
                    id: 0,
                    name: 'Alon Smith',
                    path: 'profile-34.jpeg',
                    designation: 'Software Developer',
                },
                contactList: [{
                        userId: 1,
                        name: 'Nia Hillyer',
                        path: 'profile-16.jpeg',
                        time: '2:09 PM',
                        preview: 'How do you do?',
                        messages: [{
                                fromUserId: 0,
                                toUserId: 1,
                                text: 'Hi, I am back from vacation',
                            },
                            {
                                fromUserId: 0,
                                toUserId: 1,
                                text: 'How are you?',
                            },
                            {
                                fromUserId: 1,
                                toUserId: 0,
                                text: 'Welcom Back',
                            },
                            {
                                fromUserId: 1,
                                toUserId: 0,
                                text: 'I am all well',
                            },
                            {
                                fromUserId: 0,
                                toUserId: 1,
                                text: 'Coffee?',
                            },
                        ],
                        active: true,
                    },
                    {
                        userId: 2,
                        name: 'Sean Freeman',
                        path: 'profile-1.jpeg',
                        time: '12:09 PM',
                        preview: 'I was wondering...',
                        messages: [{
                                fromUserId: 0,
                                toUserId: 2,
                                text: 'Hello',
                            },
                            {
                                fromUserId: 0,
                                toUserId: 2,
                                text: "It's me",
                            },
                            {
                                fromUserId: 0,
                                toUserId: 2,
                                text: 'I have a question regarding project.',
                            },
                        ],
                        active: false,
                    },
                    {
                        userId: 3,
                        name: 'Alma Clarke',
                        path: 'profile-2.jpeg',
                        time: '1:44 PM',
                        preview: 'I’ve forgotten how it felt before',
                        messages: [{
                                fromUserId: 0,
                                toUserId: 3,
                                text: 'Hey Buddy.',
                            },
                            {
                                fromUserId: 0,
                                toUserId: 3,
                                text: "What's up",
                            },
                            {
                                fromUserId: 3,
                                toUserId: 0,
                                text: 'I am sick',
                            },
                            {
                                fromUserId: 0,
                                toUserId: 3,
                                text: 'Not comming to office today.',
                            },
                        ],
                        active: true,
                    },
                    {
                        userId: 4,
                        name: 'StarCode Kh',
                        path: 'profile-3.jpeg',
                        time: '2:06 PM',
                        preview: 'But we’re probably gonna need a new carpet.',
                        messages: [{
                                fromUserId: 0,
                                toUserId: 4,
                                text: 'Hi, collect your check',
                            },
                            {
                                fromUserId: 4,
                                toUserId: 0,
                                text: 'Ok, I will be there in 10 mins',
                            },
                        ],
                        active: true,
                    },
                    {
                        userId: 5,
                        name: 'StarCode Kh',
                        path: 'profile-4.jpeg',
                        time: '2:05 PM',
                        preview: 'It’s not that bad...',
                        messages: [{
                                fromUserId: 0,
                                toUserId: 3,
                                text: 'Hi, I am back from vacation',
                            },
                            {
                                fromUserId: 0,
                                toUserId: 3,
                                text: 'How are you?',
                            },
                            {
                                fromUserId: 0,
                                toUserId: 5,
                                text: 'Welcom Back',
                            },
                            {
                                fromUserId: 0,
                                toUserId: 5,
                                text: 'I am all well',
                            },
                            {
                                fromUserId: 5,
                                toUserId: 0,
                                text: 'Coffee?',
                            },
                        ],
                        active: false,
                    },
                    {
                        userId: 6,
                        name: 'Roxanne',
                        path: 'profile-5.jpeg',
                        time: '2:00 PM',
                        preview: 'Wasup for the third time like is you bling bitch',
                        messages: [{
                                fromUserId: 0,
                                toUserId: 6,
                                text: 'Hi',
                            },
                            {
                                fromUserId: 0,
                                toUserId: 6,
                                text: 'Uploaded files to server.',
                            },
                        ],
                        active: false,
                    },
                    {
                        userId: 7,
                        name: 'Ernest Reeves',
                        path: 'profile-6.jpeg',
                        time: '2:09 PM',
                        preview: 'Wasup for the third time like is you bling bitch',
                        messages: [],
                        active: true,
                    },
                    {
                        userId: 8,
                        name: 'Laurie Fox',
                        path: 'profile-7.jpeg',
                        time: '12:09 PM',
                        preview: 'Wasup for the third time like is you bling bitch',
                        messages: [],
                        active: true,
                    },
                    {
                        userId: 9,
                        name: 'Xavier',
                        path: 'profile-8.jpeg',
                        time: '4:09 PM',
                        preview: 'Wasup for the third time like is you bling bitch',
                        messages: [],
                        active: false,
                    },
                    {
                        userId: 10,
                        name: 'Susan Phillips',
                        path: 'profile-9.jpeg',
                        time: '9:00 PM',
                        preview: 'Wasup for the third time like is you bling bitch',
                        messages: [],
                        active: true,
                    },
                    {
                        userId: 11,
                        name: 'Dale Butler',
                        path: 'profile-10.jpeg',
                        time: '5:09 PM',
                        preview: 'Wasup for the third time like is you bling bitch',
                        messages: [],
                        active: false,
                    },
                    {
                        userId: 12,
                        name: 'Grace Roberts',
                        path: 'user-profile.jpeg',
                        time: '8:01 PM',
                        preview: 'Wasup for the third time like is you bling bitch',
                        messages: [],
                        active: true,
                    },
                ],
                searchUser: '',
                textMessage: '',
                selectedUser: '',

                get searchUsers() {
                    setTimeout(() => {
                        const element = document.querySelector('.chat-users');
                        element.scrollTop = 0;
                        element.behavior = 'smooth';
                    });
                    return this.contactList.filter((d) => {
                        return d.name.toLowerCase().includes(this.searchUser);
                    });
                },

                selectUser(user) {
                    this.selectedUser = user;
                    this.isShowUserChat = true;
                    this.scrollToBottom;
                    this.isShowChatMenu = false;
                },

                sendMessage() {
                    if (this.textMessage.trim()) {
                        const user = this.contactList.find((d) => d.userId === this.selectedUser
                        .userId);
                        user.messages.push({
                            fromUserId: this.selectedUser.userId,
                            toUserId: 0,
                            text: this.textMessage,
                            time: 'Just now',
                        });
                        this.textMessage = '';
                        this.scrollToBottom;
                    }
                },

                get scrollToBottom() {
                    if (this.isShowUserChat) {
                        setTimeout(() => {
                            const element = document.querySelector(
                            '.chat-conversation-box');
                            element.scrollIntoView({
                                behavior: 'smooth',
                                block: 'end',
                            });
                        });
                    }
                },
            }));
        });
    </script>
</body>

</html>
