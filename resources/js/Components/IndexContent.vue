<template>
    <!--Heros Section-->
    <header>
        <nav x-data="{ isOpen: false }" class="bg-white shadow dark:bg-gray-900">

        </nav>

        <div class="w-full bg-left-top h-[40rem]" style="background-image: url('/images/4808.jpg');">

            <div class="items-start p-60 justify-center w-full h-full bg-gray-900/10">
                <div class="">
                    <span class="relative flex h-4 w-4">
                    <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                    <span class="relative inline-flex rounded-full h-4 w-4 bg-sky-500"></span></span>
                    <h2 class="text-5xl font-semibold text-white ">
                        Bilişim <span class="text-white">Üniversitesi</span> </h2>
                    <h1 class="text-5xl font-semibold text-white">
                        <h5 class="slider">
                        <h5 class="slider__word">Programlama</h5>
                        <h5 class="slider__word">Robotik Kodlama</h5>
                        <h5 class="slider__word">Yapay Zaka</h5>
                        </h5>
                    </h1>

                    <button class="w-full px-5 py-2 mt-4 text-sm font-medium text-white capitalize transition-colors duration-150 transform bg-blue-600 rounded-md lg:w-auto
                         hover:bg-blue-500 focus:outline-none focus:bg-blue-500">
                        Hemen Kaydol
                    </button>

                </div>
            </div>
        </div>
        <hr class="shadow-2xl">
    </header>
    <!--Heros Section-->

    <!--Featured Section-->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 pt-10 mx-auto">
            <div class="lg:flex lg:items-center">
                <div class="w-full space-y-12 lg:w-1/2 ">
                    <div>
                        <h1 class="text-2xl font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">explore our <br> awesome Components</h1>

                        <div class="mt-2">
                            <span class="inline-block w-40 h-1 bg-blue-500 rounded-full"></span>
                            <span class="inline-block w-3 h-1 ml-1 bg-blue-500 rounded-full"></span>
                            <span class="inline-block w-1 h-1 ml-1 bg-blue-500 rounded-full"></span>
                        </div>
                    </div>

                    <div class="md:flex md:items-start md:-mx-4">
                    <span class="inline-block p-2 text-blue-500 bg-blue-100 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                                                <i class="fa fa-home" aria-hidden="true"></i>

                    </span>

                        <div class="mt-4 md:mx-4 md:mt-0">
                            <h1 class="text-xl font-semibold text-gray-700 capitalize dark:text-white">Copy & paste components</h1>

                            <p class="mt-3 text-gray-500 dark:text-gray-300">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ab nulla quod dignissimos vel non corrupti doloribus voluptatum eveniet
                            </p>
                        </div>
                    </div>

                    <div class="md:flex md:items-start md:-mx-4">
                    <span class="inline-block p-2 text-blue-500 bg-blue-100 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                                                <i class="fa fa-home" aria-hidden="true"></i>

                    </span>

                        <div class="mt-4 md:mx-4 md:mt-0">
                            <h1 class="text-xl font-semibold text-gray-700 capitalize dark:text-white">Zero Configuration</h1>

                            <p class="mt-3 text-gray-500 dark:text-gray-300">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ab nulla quod dignissimos vel non corrupti doloribus voluptatum eveniet
                            </p>
                        </div>
                    </div>

                    <div class="md:flex md:items-start md:-mx-4">
                    <span class="inline-block p-2 text-blue-500 bg-blue-100 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                                                <i class="fa fa-home" aria-hidden="true"></i>

                    </span>

                        <div class="mt-4 md:mx-4 md:mt-0">
                            <h1 class="text-xl font-semibold text-gray-700 capitalize dark:text-white">elegant Dark Mode</h1>

                            <p class="mt-3 text-gray-500 dark:text-gray-300">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ab nulla quod dignissimos vel non corrupti doloribus voluptatum eveniet
                            </p>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:flex lg:items-center lg:w-1/2 lg:justify-center">
                    <img class="w-[28rem] h-[28rem] object-cover xl:w-[34rem] xl:h-[34rem] rounded-full" src="https://images.unsplash.com/photo-1507238691740-187a5b1d37b8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=755&q=80" alt="">
                </div>
            </div>

            <hr class="my-8 border-gray-200 dark:border-gray-700">


        </div>
    </section>
    <!--Featured Section-->

        <!--Video Section-->
    <section class="bg-white dark:bg-gray-900">
        <div class="container px-6 pt-5 mx-auto">
            <h1 class="text-2xl text-center font-semibold text-gray-800 capitalize lg:text-3xl dark:text-white">explore our awesome <span class="text-blue-500">Components</span></h1>

            <iframe class="min-w-full mt-12 h-64 md:h-[450px] rounded-xl overflow-hidden" src="https://vimeo.com/showcase/7060635/video/525707984/embed" frameborder="0" allow="autoplay; fullscreen"></iframe>

            <div class="grid grid-cols-1 gap-8 mt-8 xl:mt-12 xl:gap-12 md:grid-cols-2">
                <div class="p-6 border rounded-xl border-r-gray-200 dark:border-gray-700">
                    <div class="md:flex md:items-start md:-mx-4">
                    <span class="inline-block p-2 text-blue-500 bg-blue-100 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                        <i class="fa fa-home" aria-hidden="true"></i>

                    </span>

                        <div class="mt-4 md:mx-4 md:mt-0">
                            <h1 class="text-xl font-medium text-gray-700 capitalize dark:text-white">Copy & paste components</h1>

                            <p class="mt-3 text-gray-500 dark:text-gray-300">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ab nulla quod dignissimos vel non corrupti doloribus voluptatum eveniet
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-6 border rounded-xl border-r-gray-200 dark:border-gray-700">
                    <div class="md:flex md:items-start md:-mx-4">
                    <span class="inline-block p-2 text-blue-500 bg-blue-100 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                        <i class="fa fa-home" aria-hidden="true"></i>

                    </span>

                        <div class="mt-4 md:mx-4 md:mt-0">
                            <h1 class="text-xl font-medium text-gray-700 capitalize dark:text-white">Zero Configuration</h1>

                            <p class="mt-3 text-gray-500 dark:text-gray-300">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ab nulla quod dignissimos vel non corrupti doloribus voluptatum eveniet
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-6 border rounded-xl border-r-gray-200 dark:border-gray-700">
                    <div class="md:flex md:items-start md:-mx-4">
                    <span class="inline-block p-2 text-blue-500 bg-blue-100 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                        <i class="fa fa-home" aria-hidden="true"></i>

                    </span>

                        <div class="mt-4 md:mx-4 md:mt-0">
                            <h1 class="text-xl font-medium text-gray-700 capitalize dark:text-white">elegant Dark Mode</h1>

                            <p class="mt-3 text-gray-500 dark:text-gray-300">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ab nulla quod dignissimos vel non corrupti doloribus voluptatum eveniet
                            </p>
                        </div>
                    </div>
                </div>

                <div class="p-6 border rounded-xl border-r-gray-200 dark:border-gray-700">
                    <div class="md:flex md:items-start md:-mx-4">
                    <span class="inline-block p-2 text-blue-500 bg-blue-100 rounded-xl md:mx-4 dark:text-white dark:bg-blue-500">
                                                <i class="fa fa-home" aria-hidden="true"></i>

                    </span>

                        <div class="mt-4 md:mx-4 md:mt-0">
                            <h1 class="text-xl font-medium text-gray-700 capitalize dark:text-white">Simple & clean designs</h1>

                            <p class="mt-3 text-gray-500 dark:text-gray-300">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Provident ab nulla quod dignissimos vel non corrupti doloribus voluptatum eveniet
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Video Section-->
</template>
<style scoped>



.slider {
    position: relative;
    height: 1.5em;
    width: 500px;
    overflow: hidden;
    margin-left: 32px;
}

.slider__word {
    font-weight: 500;
    position: absolute;
    width: 100%;
    height: 100%;
    line-height: 1.5em;
    transform: translateY(100%);
    animation: slide 3.8s linear infinite;
    color: #f5f5f5;
}

.slider__word:nth-child(2) {
    animation-delay: 0.83s;
}

.slider__word:nth-child(3) {
    animation-delay: 2.67s;
}

@keyframes slide {
    0% {
        transform: translateY(100%);
        opacity: 0.1;
    }
    15% {
        transform: translateY(0);
        opacity: 1;
    }
    30% {
        transform: translateY(0);
        opacity: 1;
    }
    45% {
        transform: translateY(-100%);
        opacity: 1;
    }
    100% {
        transform: translateY(-100%);
        opacity: 0.1;
    }
}
.st0 {
    fill: #0acf83
}

.st1 {
    fill: #a259ff
}

.st2 {
    fill: #f24e1e
}

.st3 {
    fill: #ff7262
}

.st4 {
    fill: #1abcfe
}
</style>
<script setup>
</script>
