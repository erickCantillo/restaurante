
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">
        @livewireStyles
        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
        <style>
            [x-cloak] {
                display: none;
            }
            [type="checkbox"] {
                box-sizing: border-box;
                padding: 0;
            }
            .form-checkbox,
            .form-radio {
                -webkit-appearance: none;
                -moz-appearance: none;
                appearance: none;
                -webkit-print-color-adjust: exact;
                color-adjust: exact;
                display: inline-block;
                vertical-align: middle;
                background-origin: border-box;
                -webkit-user-select: none;
                -moz-user-select: none;
                -ms-user-select: none;
                user-select: none;
                flex-shrink: 0;
                color: currentColor;
                background-color: #fff;
                border-color: #e2e8f0;
                border-width: 1px;
                height: 1.4em;
                width: 1.4em;
            }
            
            .form-checkbox {
                border-radius: 0.25rem;
            }
            
            .form-radio {
                border-radius: 50%;
            }
            
            .form-checkbox:checked {
                background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3cpath d='M5.707 7.293a1 1 0 0 0-1.414 1.414l2 2a1 1 0 0 0 1.414 0l4-4a1 1 0 0 0-1.414-1.414L7 8.586 5.707 7.293z'/%3e%3c/svg%3e");
                border-color: transparent;
                background-color: currentColor;
                background-size: 100% 100%;
                background-position: center;
                background-repeat: no-repeat;
            }
            
            .form-radio:checked {
                background-image: url("data:image/svg+xml,%3csvg viewBox='0 0 16 16' fill='white' xmlns='http://www.w3.org/2000/svg'%3e%3ccircle cx='8' cy='8' r='3'/%3e%3c/svg%3e");
                border-color: transparent;
                background-color: currentColor;
                background-size: 100% 100%;
                background-position: center;
                background-repeat: no-repeat;
            }
        </style>

        <div class="h-screen">
            <div>
                <div class="max-w-3xl mx-auto px-4 py-10">
                    <div>
                        {{ $complete }}
                    </div>
                    <div>
                        <!-- Top Navigation -->
                        <div class="border-b-2 py-0">
                            <div class="uppercase tracking-wide text-xs font-bold text-gray-500 mb-1 leading-tight" x-text="`Paso: ${step} of 3`"></div>
                            <div class="flex flex-col md:flex-row md:items-center md:justify-between">
                                <div>
                                    {{ $titulos }}
                                </div>
                                <div class="flex items-center md:w-64">
                                    <div class="w-full bg-white rounded-full mr-2">
                                    
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <!-- /Top Navigation -->

                        <!-- Step Content -->
                        <div class="py-2">
                            {{ $contet }}
                            
                        </div>
                        <!-- / Step Content -->
                    </div>
                </div>

                <!-- Bottom Navigation -->
                <div class="fixed bottom-0 left-0 right-0 py-2 bg-white shadow-md" x-show="step != 'complete'">
                    <div class="max-w-3xl mx-auto px-4">
                        <div class="flex justify-between">
                            <div class="w-1/2">
                                <button x-show="step > 1" @click="step--" class="w-32 focus:outline-none py-2 px-5 rounded-lg shadow-sm text-center text-gray-600 bg-white hover:bg-gray-100 font-medium border">Previous</button>
                            </div>

                            <div class="w-1/2 text-right">
                                <button x-show="step < 3" @click="step++" class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Next</button>

                                <button @click="step = 'complete'" x-show="step === 3" class="w-32 focus:outline-none border border-transparent py-2 px-5 rounded-lg shadow-sm text-center text-white bg-blue-500 hover:bg-blue-600 font-medium">Complete</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- / Bottom Navigation https://placehold.co/300x300/e2e8f0/cccccc -->
            </div>
        </div>
        @stack('modals')

        @livewireScripts
    </body>
</html>
