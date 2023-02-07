<div x-data="{ open: @entangle('open'), question_id: @entangle('question_id') }" x-show="open" @update-question.window="open=true; question_id=$event.detail.id"
    @keydown.window.prevent.escape="open=false" x-on:close-update-modal.window="open=false"
    class="absolute top-0 left-0 w-full h-full flex items-center justify-center backdrop-blur-sm">
    <div @click.outside="open=false" class="w-full max-w-sm md:w-11/12 bg-white shadow-lg md:rounded-md">
        <header class="p-2 flex flex-row items-center justify-between bg-slate-200 md:rounded-t-md">
            <h2 class="text-gray-800 font-semibold">Update Question</h2>
            <button @click="open=false" class="group w-8 h-8 p-1">
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
                <x-input-label for="upt-question" :value="__('Question')" />
                <x-text-input id="upt-question" class="block mt-1 w-full" type="text" wire:model="question" required
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
        <footer class="p-2 flex flex-row items-center justify-end bg-slate-200 md:rounded-b-md">
            <button wire:click="delete"
                class="mr-auto px-2 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md uppercase text-sm">Delete</button>
            <button wire:click="save"
                class="px-2 py-1 bg-gray-500 hover:bg-gray-600 text-white rounded-md uppercase text-sm">Update</button>
        </footer>
    </div>
</div>
