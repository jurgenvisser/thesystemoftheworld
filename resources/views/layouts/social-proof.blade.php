{{-- The Stats / Social Proof --}}
<section class="border-y border-zinc-800 bg-zinc-900/30">
    @php
        $stats = [
            ['label' => 'Leden', 'val' => $totalFollowerCount],
            ['label' => 'Levens Veranderd', 'val' => floor($totalFollowerCount*0.075) . '+'],
            ['label' => 'Actieve Leden', 'val' => $discordMemberCount],
            ['label' => 'Inzet', 'val' => '100%'],
        ];
    @endphp

    <div class="grid grid-cols-2 md:grid-cols-4 md:divide-x divide-zinc-800">
        @foreach ($stats as $stat)
            <div class="p-8 text-center hover:bg-colorPrimary/10 transition-colors">
                <div class="text-3xl md:text-4xl font-bold text-white mb-2">{{ $stat['val'] }}</div>
                <div class="text-xs font-mono uppercase tracking-widest text-zinc-500">{{ $stat['label'] }}</div>
            </div>
        @endforeach
    </div>
</section>