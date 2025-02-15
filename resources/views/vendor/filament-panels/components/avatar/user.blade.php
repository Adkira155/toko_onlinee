@props([
    'user' => filament()->auth()->user(),
])

<x-filament::avatar
    :src="$user->avatar_url ?? filament()->getUserAvatarUrl($user)"
    :src="filament()->GetUserAvatarUrl($user)"
    :alt="__('filament-panels::layout.avatar.alt', ['name' => filament()->getUserName($user)])"
    :attributes="
        \Filament\Support\prepare_inherited_attributes($attributes)
            ->class(['fi-user-avatar'])
    "
/>
