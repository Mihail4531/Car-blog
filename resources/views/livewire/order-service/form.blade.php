<form wire:submit.prevent='submit'>
    <input type="text" placeholder="Введите имя" wire:model='form.name'>
    <input type="email" placeholder="Введите Email" wire:model='form.email'>
    <textarea wire:model='form.coment'></textarea>
    <button>{{ __('Оставить заявку') }}</button>
</form>
