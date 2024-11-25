<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>AirWay Docs</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Styles / Scripts -->
        @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
            @vite(['resources/css/app.css', 'resources/js/app.js'])
        @else
            <style>
                /* ! tailwindcss v3.4.1 | MIT License | https://tailwindcss.com */*,::after,::before{box-sizing:border-box;border-width:0;border-style:solid;border-color:#e5e7eb}::after,::before{--tw-content:''}:host,html{line-height:1.5;-webkit-text-size-adjust:100%;-moz-tab-size:4;tab-size:4;font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;font-feature-settings:normal;font-variation-settings:normal;-webkit-tap-highlight-color:transparent}body{margin:0;line-height:inherit}hr{height:0;color:inherit;border-top-width:1px}abbr:where([title]){-webkit-text-decoration:underline dotted;text-decoration:underline dotted}h1,h2,h3,h4,h5,h6{font-size:inherit;font-weight:inherit}a{color:inherit;text-decoration:inherit}b,strong{font-weight:bolder}code,kbd,pre,samp{font-family:ui-monospace, SFMono-Regular, Menlo, Monaco, Consolas, "Liberation Mono", "Courier New", monospace;font-feature-settings:normal;font-variation-settings:normal;font-size:1em}small{font-size:80%}sub,sup{font-size:75%;line-height:0;position:relative;vertical-align:baseline}sub{bottom:-.25em}sup{top:-.5em}table{text-indent:0;border-color:inherit;border-collapse:collapse}button,input,optgroup,select,textarea{font-family:inherit;font-feature-settings:inherit;font-variation-settings:inherit;font-size:100%;font-weight:inherit;line-height:inherit;color:inherit;margin:0;padding:0}button,select{text-transform:none}[type=button],[type=reset],[type=submit],button{-webkit-appearance:button;background-color:transparent;background-image:none}:-moz-focusring{outline:auto}:-moz-ui-invalid{box-shadow:none}progress{vertical-align:baseline}::-webkit-inner-spin-button,::-webkit-outer-spin-button{height:auto}[type=search]{-webkit-appearance:textfield;outline-offset:-2px}::-webkit-search-decoration{-webkit-appearance:none}::-webkit-file-upload-button{-webkit-appearance:button;font:inherit}summary{display:list-item}blockquote,dd,dl,figure,h1,h2,h3,h4,h5,h6,hr,p,pre{margin:0}fieldset{margin:0;padding:0}legend{padding:0}menu,ol,ul{list-style:none;margin:0;padding:0}dialog{padding:0}textarea{resize:vertical}input::placeholder,textarea::placeholder{opacity:1;color:#9ca3af}[role=button],button{cursor:pointer}:disabled{cursor:default}audio,canvas,embed,iframe,img,object,svg,video{display:block;vertical-align:middle}img,video{max-width:100%;height:auto}[hidden]{display:none}*, ::before, ::after{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }::backdrop{--tw-border-spacing-x:0;--tw-border-spacing-y:0;--tw-translate-x:0;--tw-translate-y:0;--tw-rotate:0;--tw-skew-x:0;--tw-skew-y:0;--tw-scale-x:1;--tw-scale-y:1;--tw-pan-x: ;--tw-pan-y: ;--tw-pinch-zoom: ;--tw-scroll-snap-strictness:proximity;--tw-gradient-from-position: ;--tw-gradient-via-position: ;--tw-gradient-to-position: ;--tw-ordinal: ;--tw-slashed-zero: ;--tw-numeric-figure: ;--tw-numeric-spacing: ;--tw-numeric-fraction: ;--tw-ring-inset: ;--tw-ring-offset-width:0px;--tw-ring-offset-color:#fff;--tw-ring-color:rgb(59 130 246 / 0.5);--tw-ring-offset-shadow:0 0 #0000;--tw-ring-shadow:0 0 #0000;--tw-shadow:0 0 #0000;--tw-shadow-colored:0 0 #0000;--tw-blur: ;--tw-brightness: ;--tw-contrast: ;--tw-grayscale: ;--tw-hue-rotate: ;--tw-invert: ;--tw-saturate: ;--tw-sepia: ;--tw-drop-shadow: ;--tw-backdrop-blur: ;--tw-backdrop-brightness: ;--tw-backdrop-contrast: ;--tw-backdrop-grayscale: ;--tw-backdrop-hue-rotate: ;--tw-backdrop-invert: ;--tw-backdrop-opacity: ;--tw-backdrop-saturate: ;--tw-backdrop-sepia: }.absolute{position:absolute}.relative{position:relative}.-left-20{left:-5rem}.top-0{top:0px}.-bottom-16{bottom:-4rem}.-left-16{left:-4rem}.-mx-3{margin-left:-0.75rem;margin-right:-0.75rem}.mt-4{margin-top:1rem}.mt-6{margin-top:1.5rem}.flex{display:flex}.grid{display:grid}.hidden{display:none}.aspect-video{aspect-ratio:16 / 9}.size-12{width:3rem;height:3rem}.size-5{width:1.25rem;height:1.25rem}.size-6{width:1.5rem;height:1.5rem}.h-12{height:3rem}.h-40{height:10rem}.h-full{height:100%}.min-h-screen{min-height:100vh}.w-full{width:100%}.w-\[calc\(100\%\+8rem\)\]{width:calc(100% + 8rem)}.w-auto{width:auto}.max-w-\[877px\]{max-width:877px}.max-w-2xl{max-width:42rem}.flex-1{flex:1 1 0%}.shrink-0{flex-shrink:0}.grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.flex-col{flex-direction:column}.items-start{align-items:flex-start}.items-center{align-items:center}.items-stretch{align-items:stretch}.justify-end{justify-content:flex-end}.justify-center{justify-content:center}.gap-2{gap:0.5rem}.gap-4{gap:1rem}.gap-6{gap:1.5rem}.self-center{align-self:center}.overflow-hidden{overflow:hidden}.rounded-\[10px\]{border-radius:10px}.rounded-full{border-radius:9999px}.rounded-lg{border-radius:0.5rem}.rounded-md{border-radius:0.375rem}.rounded-sm{border-radius:0.125rem}.bg-\[\#FF2D20\]\/10{background-color:rgb(255 45 32 / 0.1)}.bg-white{--tw-bg-opacity:1;background-color:rgb(255 255 255 / var(--tw-bg-opacity))}.bg-gradient-to-b{background-image:linear-gradient(to bottom, var(--tw-gradient-stops))}.from-transparent{--tw-gradient-from:transparent var(--tw-gradient-from-position);--tw-gradient-to:rgb(0 0 0 / 0) var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), var(--tw-gradient-to)}.via-white{--tw-gradient-to:rgb(255 255 255 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #fff var(--tw-gradient-via-position), var(--tw-gradient-to)}.to-white{--tw-gradient-to:#fff var(--tw-gradient-to-position)}.stroke-\[\#FF2D20\]{stroke:#FF2D20}.object-cover{object-fit:cover}.object-top{object-position:top}.p-6{padding:1.5rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.py-10{padding-top:2.5rem;padding-bottom:2.5rem}.px-3{padding-left:0.75rem;padding-right:0.75rem}.py-16{padding-top:4rem;padding-bottom:4rem}.py-2{padding-top:0.5rem;padding-bottom:0.5rem}.pt-3{padding-top:0.75rem}.text-center{text-align:center}.font-sans{font-family:Figtree, ui-sans-serif, system-ui, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji}.text-sm{font-size:0.875rem;line-height:1.25rem}.text-sm\/relaxed{font-size:0.875rem;line-height:1.625}.text-xl{font-size:1.25rem;line-height:1.75rem}.font-semibold{font-weight:600}.text-black{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.underline{-webkit-text-decoration-line:underline;text-decoration-line:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.shadow-\[0px_14px_34px_0px_rgba\(0\2c 0\2c 0\2c 0\.08\)\]{--tw-shadow:0px 14px 34px 0px rgba(0,0,0,0.08);--tw-shadow-colored:0px 14px 34px 0px var(--tw-shadow-color);box-shadow:var(--tw-ring-offset-shadow, 0 0 #0000), var(--tw-ring-shadow, 0 0 #0000), var(--tw-shadow)}.ring-1{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.ring-transparent{--tw-ring-color:transparent}.ring-white\/\[0\.05\]{--tw-ring-color:rgb(255 255 255 / 0.05)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.06\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.06));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.drop-shadow-\[0px_4px_34px_rgba\(0\2c 0\2c 0\2c 0\.25\)\]{--tw-drop-shadow:drop-shadow(0px 4px 34px rgba(0,0,0,0.25));filter:var(--tw-blur) var(--tw-brightness) var(--tw-contrast) var(--tw-grayscale) var(--tw-hue-rotate) var(--tw-invert) var(--tw-saturate) var(--tw-sepia) var(--tw-drop-shadow)}.transition{transition-property:color, background-color, border-color, fill, stroke, opacity, box-shadow, transform, filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter;transition-property:color, background-color, border-color, text-decoration-color, fill, stroke, opacity, box-shadow, transform, filter, backdrop-filter, -webkit-text-decoration-color, -webkit-backdrop-filter;transition-timing-function:cubic-bezier(0.4, 0, 0.2, 1);transition-duration:150ms}.duration-300{transition-duration:300ms}.selection\:bg-\[\#FF2D20\] *::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white *::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.selection\:bg-\[\#FF2D20\]::selection{--tw-bg-opacity:1;background-color:rgb(255 45 32 / var(--tw-bg-opacity))}.selection\:text-white::selection{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.hover\:text-black:hover{--tw-text-opacity:1;color:rgb(0 0 0 / var(--tw-text-opacity))}.hover\:text-black\/70:hover{color:rgb(0 0 0 / 0.7)}.hover\:ring-black\/20:hover{--tw-ring-color:rgb(0 0 0 / 0.2)}.focus\:outline-none:focus{outline:2px solid transparent;outline-offset:2px}.focus-visible\:ring-1:focus-visible{--tw-ring-offset-shadow:var(--tw-ring-inset) 0 0 0 var(--tw-ring-offset-width) var(--tw-ring-offset-color);--tw-ring-shadow:var(--tw-ring-inset) 0 0 0 calc(1px + var(--tw-ring-offset-width)) var(--tw-ring-color);box-shadow:var(--tw-ring-offset-shadow), var(--tw-ring-shadow), var(--tw-shadow, 0 0 #0000)}.focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}@media (min-width: 640px){.sm\:size-16{width:4rem;height:4rem}.sm\:size-6{width:1.5rem;height:1.5rem}.sm\:pt-5{padding-top:1.25rem}}@media (min-width: 768px){.md\:row-span-3{grid-row:span 3 / span 3}}@media (min-width: 1024px){.lg\:col-start-2{grid-column-start:2}.lg\:h-16{height:4rem}.lg\:max-w-7xl{max-width:80rem}.lg\:grid-cols-3{grid-template-columns:repeat(3, minmax(0, 1fr))}.lg\:grid-cols-2{grid-template-columns:repeat(2, minmax(0, 1fr))}.lg\:flex-col{flex-direction:column}.lg\:items-end{align-items:flex-end}.lg\:justify-center{justify-content:center}.lg\:gap-8{gap:2rem}.lg\:p-10{padding:2.5rem}.lg\:pb-10{padding-bottom:2.5rem}.lg\:pt-0{padding-top:0px}.lg\:text-\[\#FF2D20\]{--tw-text-opacity:1;color:rgb(255 45 32 / var(--tw-text-opacity))}}@media (prefers-color-scheme: dark){.dark\:block{display:block}.dark\:hidden{display:none}.dark\:bg-black{--tw-bg-opacity:1;background-color:rgb(0 0 0 / var(--tw-bg-opacity))}.dark\:bg-zinc-900{--tw-bg-opacity:1;background-color:rgb(24 24 27 / var(--tw-bg-opacity))}.dark\:via-zinc-900{--tw-gradient-to:rgb(24 24 27 / 0)  var(--tw-gradient-to-position);--tw-gradient-stops:var(--tw-gradient-from), #18181b var(--tw-gradient-via-position), var(--tw-gradient-to)}.dark\:to-zinc-900{--tw-gradient-to:#18181b var(--tw-gradient-to-position)}.dark\:text-white\/50{color:rgb(255 255 255 / 0.5)}.dark\:text-white{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:text-white\/70{color:rgb(255 255 255 / 0.7)}.dark\:ring-zinc-800{--tw-ring-opacity:1;--tw-ring-color:rgb(39 39 42 / var(--tw-ring-opacity))}.dark\:hover\:text-white:hover{--tw-text-opacity:1;color:rgb(255 255 255 / var(--tw-text-opacity))}.dark\:hover\:text-white\/70:hover{color:rgb(255 255 255 / 0.7)}.dark\:hover\:text-white\/80:hover{color:rgb(255 255 255 / 0.8)}.dark\:hover\:ring-zinc-700:hover{--tw-ring-opacity:1;--tw-ring-color:rgb(63 63 70 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-\[\#FF2D20\]:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 45 32 / var(--tw-ring-opacity))}.dark\:focus-visible\:ring-white:focus-visible{--tw-ring-opacity:1;--tw-ring-color:rgb(255 255 255 / var(--tw-ring-opacity))}}
            </style>
        @endif
    </head>
    <body class="font-sans antialiased dark:bg-black dark:text-white/50">
        <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
            <img id="background" class="absolute -left-20 top-0 max-w-[877px]" src="https://laravel.com/assets/img/welcome/background.svg" alt="Laravel background" />
            <div class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FFA500] selection:text-white">
                <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                    <header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-3">
                        <div class="flex lg:justify-center lg:col-start-2">
                        </div>
                        
                    </header>

                    <h1 class="text-xl font-semibold text-black dark:text-white">AirWay Docs</h1>

                    <main class="mt-6">
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                            <a
                                
                                id="docs-card"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FFA500] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FFA500]"
                            >
                                <div id="screenshot-container" class="relative flex w-full flex-1 items-stretch">
                                    <img
                                        src=""
                                        alt="Laravel documentation screenshot"
                                        class="aspect-video h-full w-full flex-1 rounded-[10px] object-top object-cover drop-shadow-[0px_4px_34px_rgba(0,0,0,0.06)] dark:hidden"
                                        onerror="
                                            document.getElementById('screenshot-container').classList.add('!hidden');
                                            document.getElementById('docs-card').classList.add('!row-span-1');
                                            document.getElementById('docs-card-content').classList.add('!flex-row');
                                            document.getElementById('background').classList.add('!hidden');
                                        "
                                    />

                                    <p class="json1 text-sm/relaxed">
                                    
                                    {<br>
                                        "id": 1,<br>
                                        "name": "Juan Pérez",<br>
                                        "email": "juan.perez@unicolombo.edu.co",<br>
                                        "email_verified_at": "2024-10-20",<br>
                                        "password": "Developer_2004+",<br>
                                        "remember_token": "Adm1nLoc2024+",<br>
                                        "created_at": "2024-10-01",<br>
                                        "updated_at": "2024-10-15"<br>
                                    }

                                    <br><br><br>
                                        
                                    {<br>
                                        "id": "EFM-282",<br>
                                        "user_id": 1,<br>
                                        "ip_address": "192.168.1.1",<br>
                                        "user_agent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/94.0.4606.81 Safari/537.36",<br>
                                        "payload": "{\"preferences\": {\"theme\": \"dark\", \"notifications\": true}}",<br>
                                        "last_activity": 1697817300 <br>
                                    }

                                    <br><br><br>
                                    {<br>
                                        "id": "ABC-123",<br>
                                        "plan_name": "Anual Plan",<br>
                                        "percentage_fee": 5.00,<br>
                                        "description": "Plan básico con tarifa de servicio del 5%.",<br>
                                        "price": 99.99,<br>
                                        "created_at": "2024-01-01",<br>
                                        "updated_at": "2024-10-0"<br>
                                    }


                                    </p>
                                   
                                </div>

                                <div class="relative flex items-center gap-6 lg:items-end">
                                    <div id="docs-card-content" class="flex items-start gap-6 lg:flex-col">
                                        <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FFA500]/10 sm:size-16">
                                        </div>

                                       
                                    </div>

                                    <svg class="size-6 shrink-0 stroke-[#FFA500]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                                </div>
                            </a>

                            <a
                                
                                class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                            >
                                <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                            <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FFA500]/10 sm:size-16">
                                <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <g fill="#FFA500">
                                        <path d="M12 4V1L8 5l4 4V6c3.87 0 7 3.13 7 7s-3.13 7-7 7-7-3.13-7-7H5c0 4.97 4.03 9 9 9s9-4.03 9-9-4.03-9-9-9z"/>
                                    </g>
                                </svg>
                            </div>

                            <div class="pt-3 sm:pt-5">
                                <h2 class="text-xl font-semibold text-black dark:text-white">PUT</h2>

                                <p class="mt-4 text-sm/relaxed">
                                    Propósito: Se utiliza para actualizar recursos existentes en el servidor. A diferencia de POST, que generalmente se usa para crear nuevos recursos, PUT reemplaza la representación completa de un recurso con los datos proporcionados.
                                    Usos típicos: Actualizar un recurso completo, como editar los detalles de una empresa existente.
                                </p>
                            </div>
                        </div>


                                <svg class="size-6 shrink-0 self-center stroke-[#FFA500]" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                            </a>

                            <a
                                
                                class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]"
                                >
                                <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                    <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FFA500]/10 sm:size-16">
                                        <!-- Icono de enviar (sobre o flecha) -->
                                        <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                            <g fill="#FFA500">
                                                <path d="M8.75 4.5H5.5c-.69 0-1.25.56-1.25 1.25v4.75c0 .69.56 1.25 1.25 1.25h3.25c.69 0 1.25-.56 1.25-1.25V5.75c0-.69-.56-1.25-1.25-1.25Z"/>
                                                <path d="M24 10a3 3 0 0 0-3-3h-2V2.5a2 2 0 0 0-2-2H2a2 2 0 0 0-2 2V20a3.5 3.5 0 0 0 3.5 3.5h17A3.5 3.5 0 0 0 24 20V10ZM3.5 21.5A1.5 1.5 0 0 1 2 20V3a.5.5 0 0 1 .5-.5h14a.5.5 0 0 1 .5.5v17c0 .295.037.588.11.874a.5.5 0 0 1-.484.625L3.5 21.5ZM22 20a1.5 1.5 0 1 1-3 0V9.5a.5.5 0 0 1 .5-.5H21a1 1 0 0 1 1 1v10Z"/>
                                                <path d="M12.751 6.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 7.3v-.5a.75.75 0 0 1 .751-.753ZM12.751 10.047h2a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-2A.75.75 0 0 1 12 11.3v-.5a.75.75 0 0 1 .751-.753ZM4.751 14.047h10a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-10A.75.75 0 0 1 4 15.3v-.5a.75.75 0 0 1 .751-.753ZM4.75 18.047h7.5a.75.75 0 0 1 .75.75v.5a.75.75 0 0 1-.75.75h-7.5A.75.75 0 0 1 4 19.3v-.5a.75.75 0 0 1 .75-.753Z"/>
                                            </g>
                                        </svg>
                                    </div>

                                    <div class="pt-3 sm:pt-5">
                                        <h2 class="text-xl font-semibold text-black dark:text-white">POST</h2>

                                        <p class="mt-4 text-sm/relaxed">
                                            Propósito: Se utiliza para enviar datos al servidor. Este método se usa cuando el cliente envía información para crear o almacenar nuevos datos en el servidor. 
                                            Usos típicos: Crear un nuevo recurso en el servidor, como registrar un nuevo usuario o guardar un formulario.
                                        </p>
                                    </div>
                                </div>


                                <svg class="size-6 shrink-0 self-center stroke-[#FFA500]" xmlns="" fill="none" viewBox="0 0 24 24" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75"/></svg>
                            </a>

                            <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FFA500]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <g fill="#FFA500">
                                            <path
                                                d="M16.597 12.635a.247.247 0 0 0-.08-.237 2.234 2.234 0 0 1-.769-1.68c.001-.195.03-.39.084-.578a.25.25 0 0 0-.09-.267 8.8 8.8 0 0 0-4.826-1.66.25.25 0 0 0-.268.181 2.5 2.5 0 0 1-2.4 1.824.045.045 0 0 0-.045.037 12.255 12.255 0 0 0-.093 3.86.251.251 0 0 0 .208.214c2.22.366 4.367 1.08 6.362 2.118a.252.252 0 0 0 .32-.079 10.09 10.09 0 0 0 1.597-3.733ZM13.616 17.968a.25.25 0 0 0-.063-.407A19.697 19.697 0 0 0 8.91 15.98a.25.25 0 0 0-.287.325c.151.455.334.898.548 1.328.437.827.981 1.594 1.619 2.28a.249.249 0 0 0 .32.044 29.13 29.13 0 0 0 2.506-1.99ZM6.303 14.105a.25.25 0 0 0 .265-.274 13.048 13.048 0 0 1 .205-4.045.062.062 0 0 0-.022-.07 2.5 2.5 0 0 1-.777-.982.25.25 0 0 0-.271-.149 11 11 0 0 0-5.6 2.815.255.255 0 0 0-.075.163c-.008.135-.02.27-.02.406.002.8.084 1.598.246 2.381a.25.25 0 0 0 .303.193 19.924 19.924 0 0 1 5.746-.438ZM9.228 20.914a.25.25 0 0 0 .1-.393 11.53 11.53 0 0 1-1.5-2.22 12.238 12.238 0 0 1-.91-2.465.248.248 0 0 0-.22-.187 18.876 18.876 0 0 0-5.69.33.249.249 0 0 0-.179.336c.838 2.142 2.272 4 4.132 5.353a.254.254 0 0 0 .15.048c1.41-.01 2.807-.282 4.117-.802ZM18.93 12.957l-.005-.008a.25.25 0 0 0-.268-.082 2.21 2.21 0 0 1-.41.081.25.25 0 0 0-.217.2c-.582 2.66-2.127 5.35-5.75 7.843a.248.248 0 0 0-.09.299.25.25 0 0 0 .065.091 28.703 28.703 0 0 0 2.662 2.12.246.246 0 0 0 .209.037c2.579-.701 4.85-2.242 6.456-4.378a.25.25 0 0 0 .048-.189 13.51 13.51 0 0 0-2.7-6.014ZM5.702 7.058a.254.254 0 0 0 .2-.165A2.488 2.488 0 0 1 7.98 5.245a.093.093 0 0 0 .078-.062 19.734 19.734 0 0 1 3.055-4.74.25.25 0 0 0-.21-.41 12.009 12.009 0 0 0-10.4 8.558.25.25 0 0 0 .373.281 12.912 12.912 0 0 1 4.826-1.814ZM10.773 22.052a.25.25 0 0 0-.28-.046c-.758.356-1.55.635-2.365.833a.25.25 0 0 0-.022.48c1.252.43 2.568.65 3.893.65.1 0 .2 0 .3-.008a.25.25 0 0 0 .147-.444c-.526-.424-1.1-.917-1.673-1.465ZM18.744 8.436a.249.249 0 0 0 .15.228 2.246 2.246 0 0 1 1.352 2.054c0 .337-.08.67-.23.972a.25.25 0 0 0 .042.28l.007.009a15.016 15.016 0 0 1 2.52 4.6.25.25 0 0 0 .37.132.25.25 0 0 0 .096-.114c.623-1.464.944-3.039.945-4.63a12.005 12.005 0 0 0-5.78-10.258.25.25 0 0 0-.373.274c.547 2.109.85 4.274.901 6.453ZM9.61 5.38a.25.25 0 0 0 .08.31c.34.24.616.561.8.935a.25.25 0 0 0 .3.127.631.631 0 0 1 .206-.034c2.054.078 4.036.772 5.69 1.991a.251.251 0 0 0 .267.024c.046-.024.093-.047.141-.067a.25.25 0 0 0 .151-.23A29.98 29.98 0 0 0 15.957.764a.25.25 0 0 0-.16-.164 11.924 11.924 0 0 0-2.21-.518.252.252 0 0 0-.215.076A22.456 22.456 0 0 0 9.61 5.38Z"
                                            />
                                        </g>
                                    </svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">GET</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                       Se utiliza para obtener datos del servidor. Es la operación más común cuando un cliente (como un navegador web) solicita información desde el servidor. <br><br><h1><b>Usos típicos:</b></h1> Obtener una lista de recursos o detalles de un solo recurso.
                                    </p>
                                </div>
                            </div>

                            <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FFA500]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <g fill="#FFA500">
                                            <path d="M5 3C4.44772 3 4 3.44772 4 4V5C4 5.55228 4.44772 6 5 6H19C19.5523 6 20 5.55228 20 5V4C20 3.44772 19.5523 3 19 3H5ZM3 7V20C3 20.5523 3.44772 21 4 21H20C20.5523 21 21 20.5523 21 20V7H3ZM6 19V8H18V19H6Z"/>
                                        </g>
                                    </svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">DELETE</h2>
                                    <p class="mt-4 text-sm/relaxed">
                                        Propósito: Se utiliza para eliminar un recurso en el servidor.
                                        Ejemplo de uso: Si quieres eliminar un artículo de un blog o una entrada de base de datos, enviarías una solicitud DELETE.
                                    </p>
                                </div>
                            </div>


                            <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FFA500]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <g fill="#FFA500">
                                            <path d="M3 17.25V21h3.75l12.69-12.69a3.5 3.5 0 0 0 0-4.95l-1.5-1.5a3.5 3.5 0 0 0-4.95 0L3 17.25zm16.66-8.39l1.5 1.5c.46.46.46 1.21 0 1.66L10.88 19.35c-.31.31-.68.45-1.07.45H5v-3.75c0-.39.14-.76.45-1.07l8.97-8.97a1.25 1.25 0 0 1 1.77 0z"/>
                                        </g>
                                    </svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">PATCH</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Similar a PUT, pero en lugar de reemplazar un recurso completo, modifica parcialmente un recurso existente. Se usa cuando solo necesitas actualizar ciertos campos de un objeto. Ejemplo de uso: Si solo necesitas cambiar la dirección de correo electrónico de un usuario, usarías PATCH para actualizar únicamente ese campo.
                                    </p>
                                </div>
                            </div>


                            
                            <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FFA500]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <g fill="#FFA500">
                                            <path d="M19 2H5c-1.1 0-1.99.9-1.99 2L3 20c0 1.1.89 2 1.99 2h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zM5 4h14v16H5V4zm7 10h2v2h-2zm0-4h2v2h-2zm-4 4h2v2H8zm0-4h2v2H8z"/>
                                        </g>
                                    </svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">HEAD</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Similar a GET, pero solo solicita los encabezados de la respuesta, no el cuerpo. Se utiliza para obtener información del recurso sin necesidad de transferirlo por completo. Ejemplo de uso: Verificar si un recurso está disponible sin descargar su contenido.
                                    </p>
                                </div>
                            </div>



                            
                            <div class="flex items-start gap-4 rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div class="flex size-12 shrink-0 items-center justify-center rounded-full bg-[#FFA500]/10 sm:size-16">
                                    <svg class="size-5 sm:size-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <g fill="#FFA500">
                                            <path d="M12 4c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0 10c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0 4c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2zm0-14c-1.104 0-2 .896-2 2s.896 2 2 2 2-.896 2-2-.896-2-2-2z" />
                                        </g>
                                    </svg>
                                </div>

                                <div class="pt-3 sm:pt-5">
                                    <h2 class="text-xl font-semibold text-black dark:text-white">OPTIONS</h2>

                                    <p class="mt-4 text-sm/relaxed">
                                        Permite al cliente conocer qué métodos HTTP están permitidos o soportados por el servidor para un recurso determinado. A menudo se utiliza en las configuraciones de CORS (Cross-Origin Resource Sharing). Ejemplo de uso: Un navegador podría hacer una solicitud OPTIONS antes de hacer una solicitud GET o POST para saber qué métodos están permitidos.
                                    </p>
                                </div>
                            </div>


                                

                            <div class="textdoc">

                            <p class="doc font-semibold text-black dark:text-white">

                            

                                Introducción<br><br>
                                Esta API proporciona una interfaz para gestionar recursos relacionados con el transporte aéreo, terrestre (buses y Uber) y hospedaje. <br>
                                Permite la creación, obtención, actualización y eliminación de datos relacionados con vuelos, viajes en bus, reservaciones de Uber y hospedajes. <br>
                                A continuación se describen los métodos disponibles y su uso dentro de esta API.<br>

                                Métodos HTTP Disponibles<br>
                                La API está diseñada para utilizar los métodos HTTP estándar, cada uno con un propósito específico.<br>
                                <br><br>
                                1. Obtener todas las empresas
                                URL: /companies
                                Método: GET
                                Descripción: Recupera una lista de todas las empresas registradas.
                                Respuesta:
                                200 OK si la operación es exitosa.<br>
                                2. Obtener una empresa específica
                                URL: /companies/{id}
                                Método: GET
                                Descripción: Recupera los detalles de una empresa específica mediante su ID.
                                Parámetros de URL:
                                id: El ID de la empresa que deseas obtener.
                                Respuesta:
                                200 OK si la operación es exitosa.<br>
                                3. Crear una nueva empresa
                                URL: /companies/create<br><br>
                                Método: POST
                                Descripción: Crea una nueva empresa en el sistema.
                                Cuerpo de la solicitud: Debes enviar los detalles de la nueva empresa (como nombre y dirección).
                                Respuesta:
                                201 Created si la empresa fue creada con éxito.<br>
                                4. Actualizar una empresa (actualización completa)
                                URL: /companies/update/{id}<br><br>
                                Método: PUT
                                Descripción: Actualiza completamente los datos de una empresa existente mediante su ID.
                                Parámetros de URL:
                                id: El ID de la empresa que deseas actualizar.
                                Cuerpo de la solicitud: Debes enviar los datos completos de la empresa (por ejemplo, nombre y dirección).
                                Respuesta:
                                200 OK si la operación es exitosa.<br>
                                5. Actualizar parcialmente una empresa
                                URL: /companies/updatePatch/{id}<br><br>
                                Método: PATCH
                                Descripción: Actualiza parcialmente los datos de una empresa existente.
                                Parámetros de URL:
                                id: El ID de la empresa que deseas actualizar.
                                Cuerpo de la solicitud: Debes enviar solo los campos que deseas actualizar (por ejemplo, solo el nombre o solo la dirección).
                                Respuesta:
                                200 OK si la operación es exitosa.<br><br>
                                Planes de Suscripción<br>
                                1. Obtener todos los planes
                                URL: /plan
                                Método: GET
                                Descripción: Recupera una lista de todos los planes de suscripción disponibles.
                                Respuesta:
                                200 OK si la operación es exitosa.<br>
                                2. Obtener un plan específico
                                URL: /plan/{id}
                                Método: GET
                                Descripción: Recupera los detalles de un plan específico mediante su ID.
                                Parámetros de URL:
                                id: El ID del plan que deseas obtener.
                                Respuesta:
                                200 OK si la operación es exitosa.
                                Autenticación de Usuarios<br>
                                1. Crear una cuenta de usuario
                                URL: /auth/create
                                Método: POST
                                Descripción: Crea una nueva cuenta de usuario.
                                Cuerpo de la solicitud: Debes enviar los detalles del usuario, como el correo electrónico y la contraseña.
                                Respuesta:
                                201 Created si el usuario fue creado con éxito.<br>
                                2. Iniciar sesión
                                URL: /auth/login
                                Método: POST
                                Descripción: Permite a un usuario iniciar sesión con su correo electrónico y contraseña.
                                Cuerpo de la solicitud: Debes enviar el correo electrónico y la contraseña.
                                Respuesta:
                                200 OK si la autenticación es exitosa, junto con el token de acceso (si aplica).<br>
                                3. Actualizar la información del usuario<br>
                                URL: /auth/update/{id}
                                Método: PATCH
                                Descripción: Actualiza la información de un usuario existente.
                                Parámetros de URL:
                                id: El ID del usuario que deseas actualizar.
                                Cuerpo de la solicitud: Debes enviar los campos que deseas actualizar, como el nombre o la dirección de correo electrónico.
                                Respuesta:
                                200 OK si la operación es exitosa.<br><br>
                                Gestión de Pagos<br>
                                1. Crear un pago
                                URL: /payments/create
                                Método: POST
                                Descripción: Registra un nuevo pago.
                                Cuerpo de la solicitud: Debes enviar los detalles del pago, como el monto y el método de pago.
                                Respuesta:
                                201 Created si el pago fue procesado correctamente.
                                2. Obtener los detalles de un pago<br>
                                URL: /payments/{id}
                                Método: GET
                                Descripción: Recupera los detalles de un pago específico mediante su ID.
                                Parámetros de URL:
                                id: El ID del pago que deseas consultar.
                                Respuesta:
                                200 OK si la operación es exitosa.<br><br>
                                Documentación de la API<br>
                                URL: /docs
                                Método: GET
                                Descripción: Muestra la página de bienvenida o la documentación de la API.
                                Respuesta:
                                200 OK con la página de documentación.</p>
                                
                            </div>
                        
                   <div><table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Campo</th>
            <th>Tipo de dato</th>
            <th>Restricciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>id</td>
            <td>BIGINT (AUTO_INCREMENT)</td>
            <td>Primary Key</td>
        </tr>
        <tr>
            <td>name</td>
            <td>VARCHAR</td>
            <td>NOT NULL</td>
        </tr>
        <tr>
            <td>email</td>
            <td>VARCHAR</td>
            <td>UNIQUE, NOT NULL</td>
        </tr>
        <tr>
            <td>email_verified_at</td>
            <td>TIMESTAMP</td>
            <td>NULLABLE</td>
        </tr>
        <tr>
            <td>password</td>
            <td>VARCHAR</td>
            <td>NOT NULL</td>
        </tr>
        <tr>
            <td>remember_token</td>
            <td>VARCHAR</td>
            <td>NULLABLE</td>
        </tr>
        <tr>
            <td>created_at</td>
            <td>TIMESTAMP</td>
            <td>NULLABLE</td>
        </tr>
        <tr>
            <td>updated_at</td>
            <td>TIMESTAMP</td>
            <td>NULLABLE</td>
        </tr>
    </tbody>
</table><br>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Campo</th>
            <th>Tipo de dato</th>
            <th>Restricciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>email</td>
            <td>VARCHAR</td>
            <td>Primary Key</td>
        </tr>
        <tr>
            <td>token</td>
            <td>VARCHAR</td>
            <td>NOT NULL</td>
        </tr>
        <tr>
            <td>created_at</td>
            <td>TIMESTAMP</td>
            <td>NULLABLE</td>
        </tr>
    </tbody>
</table><br>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Campo</th>
            <th>Tipo de dato</th>
            <th>Restricciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>id</td>
            <td>VARCHAR</td>
            <td>Primary Key</td>
        </tr>
        <tr>
            <td>user_id</td>
            <td>BIGINT</td>
            <td>Foreign Key (nullable)</td>
        </tr>
        <tr>
            <td>ip_address</td>
            <td>VARCHAR(45)</td>
            <td>NULLABLE</td>
        </tr>
        <tr>
            <td>user_agent</td>
            <td>TEXT</td>
            <td>NULLABLE</td>
        </tr>
        <tr>
            <td>payload</td>
            <td>LONGTEXT</td>
            <td>NOT NULL</td>
        </tr>
        <tr>
            <td>last_activity</td>
            <td>INTEGER</td>
            <td>INDEX</td>
        </tr>
    </tbody>
</table><br>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Campo</th>
            <th>Tipo de dato</th>
            <th>Restricciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>id</td>
            <td>UUID</td>
            <td>Primary Key</td>
        </tr>
        <tr>
            <td>plan_name</td>
            <td>VARCHAR</td>
            <td>UNIQUE, NOT NULL</td>
        </tr>
        <tr>
            <td>percentage_fee</td>
            <td>DECIMAL (5,2)</td>
            <td>NOT NULL</td>
        </tr>
        <tr>
            <td>description</td>
            <td>TEXT</td>
            <td>NOT NULL</td>
        </tr>
        <tr>
            <td>price</td>
            <td>DECIMAL (10,2)</td>
            <td>NOT NULL</td>
        </tr>
        <tr>
            <td>created_at</td>
            <td>TIMESTAMP</td>
            <td>NULLABLE</td>
        </tr>
        <tr>
            <td>updated_at</td>
            <td>TIMESTAMP</td>
            <td>NULLABLE</td>
        </tr>
    </tbody>
</table><br>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Campo</th>
            <th>Tipo de dato</th>
            <th>Restricciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>id</td>
            <td>UUID</td>
            <td>Primary Key</td>
        </tr>
        <tr>
            <td>company_id</td>
            <td>VARCHAR</td>
            <td>NOT NULL</td>
        </tr>
        <tr>
            <td>service_type</td>
            <td>VARCHAR</td>
            <td>NOT NULL</td>
        </tr>
        <tr>
            <td>title</td>
            <td>VARCHAR</td>
            <td>NOT NULL</td>
        </tr>
        <tr>
            <td>description</td>
            <td>TEXT</td>
            <td>NULLABLE</td>
        </tr>
        <tr>
            <td>created_at</td>
            <td>TIMESTAMP</td>
            <td>NOT NULL</td>
        </tr>
        <tr>
            <td>updated_at</td>
            <td>TIMESTAMP</td>
            <td>NOT NULL</td>
        </tr>
    </tbody>
</table><br>
<table border="1" cellpadding="5" cellspacing="0">
    <thead>
        <tr>
            <th>Campo</th>
            <th>Tipo de dato</th>
            <th>Restricciones</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>name</td>
            <td>VARCHAR</td>
            <td>Primary Key, NOT NULL</td>
        </tr>
        <tr>
            <td>email</td>
            <td>VARCHAR</td>
            <td>UNIQUE, NULLABLE</td>
        </tr>
        <tr>
            <td>phone_number</td>
            <td>VARCHAR</td>
            <td>UNIQUE, NOT NULL</td>
        </tr>
        <tr>
            <td>address</td>
            <td>TEXT</td>
            <td>NULLABLE</td>
        </tr>
        <tr>
            <td>contact_person</td>
            <td>VARCHAR</td>
            <td>NULLABLE</td>
        </tr>
        <tr>
            <td>authen_id</td>
            <td>UUID</td>
            <td>NULLABLE</td>
        </tr>
        <tr>
            <td>plan_id</td>
            <td>UUID</td>
            <td>NULLABLE</td>
        </tr>
        <tr>
            <td>created_at</td>
            <td>TIMESTAMP</td>
            <td>NOT NULL</td>
        </tr>
        <tr>
            <td>updated_at</td>
            <td>TIMESTAMP</td>
            <td>NOT NULL</td>
        </tr>
    </tbody>
</table>

</div>

                    
                    
                
            
        
    </body>
</html>
