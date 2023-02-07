<div>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questions') }}
        </h2>
    </x-slot>

    <div class="h-[calc(100vh-140px)] overflow-y-auto">
        <h2 class="ml-4 pb-3 pt-2 text-gray-500 text-xs font-bold">{{ 'QUESTIONS ' . count($questions) }}</h2>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <!-- Questions Table -->
                @if (count($questions) == 0)
                    <div class="p-6 text-gray-800">Aucune question</div>
                @else
                    @foreach ($questions as $question)
                        <div x-data="{ question: @js($question) }" @click="$dispatch('update-question', {id: question.id})"
                            class="group p-4 even:bg-slate-100 even:hover:bg-slate-200 odd:hover:bg-slate-100 transition-colors hover:cursor-pointer flex flex-row">
                            <h2 class="w-[calc(100%-60px)] truncate">{{ $question->question }}</h2>
                            <button
                                class="opacity-0 group-hover:opacity-100 w-8 h-8 ml-auto p-1 hover:bg-slate-300 transition-opacity duration-100">
                                <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M11 2H9C4 2 2 4 2 9V15C2 20 4 22 9 22H15C20 22 22 20 22 15V13"
                                        stroke="#292D32" stroke-width="1.5" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                    <path
                                        d="M16.04 3.02001L8.16 10.9C7.86 11.2 7.56 11.79 7.5 12.22L7.07 15.23C6.91 16.32 7.68 17.08 8.77 16.93L11.78 16.5C12.2 16.44 12.79 16.14 13.1 15.84L20.98 7.96001C22.34 6.60001 22.98 5.02001 20.98 3.02001C18.98 1.02001 17.4 1.66001 16.04 3.02001Z"
                                        stroke="#292D32" stroke-width="1.5" stroke-miterlimit="10"
                                        stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M14.91 4.1499C15.58 6.5399 17.45 8.4099 19.85 9.0899" stroke="#292D32"
                                        stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round"
                                        stroke-linejoin="round"></path>
                                </svg>
                            </button>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <!-- New Question Button -->
    <button type="button" x-data=""
        @click="$dispatch('new-question'); window.history.pushState({}, '', '/questions/new');"
        class="group absolute py-2 px-3 bottom-5 right-5 flex flex-row items-center justify-start bg-white hover:bg-slate-200 rounded-md shadow-lg transition-colors duration-200 ease-in-out">
        <div class="w-6 h-6 mr-2 bg-slate-100 rounded-md">
            <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" clip-rule="evenodd" class="fill-gray-500 group-hover:fill-gray-800"
                    d="M13 6C13 5.44771 12.5523 5 12 5C11.4477 5 11 5.44771 11 6V11H6C5.44771 11 5 11.4477 5 12C5 12.5523 5.44771 13 6 13H11V18C11 18.5523 11.4477 19 12 19C12.5523 19 13 18.5523 13 18V13H18C18.5523 13 19 12.5523 19 12C19 11.4477 18.5523 11 18 11H13V6Z"
                    fill="#000000"></path>
            </svg>
        </div>
        <h3 class="text-gray-500 group-hover:text-gray-800">Question</h3>
    </button>

    <!-- New Question Modal -->
    <div x-data="{ open: @entangle('new_modal_open').defer }" x-init="open = @js(request()->is('questions/new'))" x-show="open" @new-question.window="open=true"
        @keydown.window.prevent.escape="open=false; window.history.pushState({}, '', '/questions');"
        x-on:close-new-modal.window="open=false; window.history.pushState({}, '', '/questions');"
        class="absolute top-0 left-0 w-full h-full flex items-center justify-center backdrop-blur-sm">
        <div @click.outside="open=false; window.history.pushState({}, '', '/questions');"
            class="w-full max-w-sm md:w-11/12 bg-white shadow-lg md:rounded-md">
            <header class="p-2 flex flex-row items-center justify-between bg-slate-200 sm:rounded-t-md">
                <h2 class="text-gray-800 font-semibold">Create a new question</h2>
                <button @click="open=false; window.history.pushState({}, '', '/questions');" class="group w-8 h-8 p-1">
                    <svg viewBox="0 0 1024 1024" xmlns="http://www.w3.org/2000/svg">
                        <path class="fill-gray-500 group-hover:fill-gray-800"
                            d="M195.2 195.2a64 64 0 0 1 90.496 0L512 421.504 738.304 195.2a64 64 0 0 1 90.496 90.496L602.496 512 828.8 738.304a64 64 0 0 1-90.496 90.496L512 602.496 285.696 828.8a64 64 0 0 1-90.496-90.496L421.504 512 195.2 285.696a64 64 0 0 1 0-90.496z">
                        </path>
                    </svg>
                </button>
            </header>
            <main class="p-2">
                <!-- Question -->
                <div class="mt-2">
                    <x-input-label for="question" :value="__('Question')" />
                    <x-text-input id="question" class="block mt-1 w-full" type="text" wire:model="question" required
                        autofocus />
                    <x-input-error :messages="$errors->get('question')" class="mt-2" />
                </div>
                <!-- Answer -->
                <div class="mt-2">
                    <x-input-label for="answer" :value="__('Answer')" />
                    <textarea id="answer"
                        class="resize-none block mt-1 w-full p-2 bg-slate-200 border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm'"
                        type="text" wire:model="answer" required autofocus></textarea>
                    <x-input-error :messages="$errors->get('answer')" class="mt-2" />
                </div>
                <!-- General -->
                <div class="block mt-4">
                    <label for="general_cat" class="inline-flex items-center">
                        <input id="general_cat" type="checkbox"
                            class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            wire:model.defer="general_cat">
                        <span class="ml-2 text-sm text-slate-400">{{ __('General') }}</span>
                    </label>
                </div>
                <!-- Technology -->
                <div class="block mt-2">
                    <label for="tech_cat" class="inline-flex items-center">
                        <input id="tech_cat" type="checkbox"
                            class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            wire:model.defer="tech_cat">
                        <span class="ml-2 text-sm text-slate-400">{{ __('Technology') }}</span>
                    </label>
                </div>
                <!-- Usage -->
                <div class="block mt-2">
                    <label for="usage_cat" class="inline-flex items-center">
                        <input id="usage_cat" type="checkbox"
                            class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            wire:model.defer="usage_cat">
                        <span class="ml-2 text-sm text-slate-400">{{ __('Usage') }}</span>
                    </label>
                </div>
                <!-- Cards -->
                <div class="block mt-2">
                    <label for="cards_cat" class="inline-flex items-center">
                        <input id="cards_cat" type="checkbox"
                            class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            wire:model.defer="cards_cat">
                        <span class="ml-2 text-sm text-slate-400">{{ __('Cards') }}</span>
                    </label>
                </div>
                <!-- Others -->
                <div class="block mt-2 mb-4">
                    <label for="others_cat" class="inline-flex items-center">
                        <input id="others_cat" type="checkbox"
                            class="rounded border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500"
                            wire:model.defer="others_cat">
                        <span class="ml-2 text-sm text-slate-400">{{ __('Others') }}</span>
                    </label>
                </div>
            </main>
            <footer class="p-2 flex flex-row items-center justify-end bg-slate-200 md:rounded-b-sm">
                <button wire:click="save"
                    class="px-2 py-1 bg-gray-500 hover:bg-gray-600 text-white rounded-md uppercase text-sm">Create</button>
            </footer>
        </div>
    </div>

    <!-- Update Question Modal -->
    <div>
        @livewire('update-question')
    </div>
</div>
