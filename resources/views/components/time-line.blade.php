<?php

use App\Models\Lists;
/* @var $programs */
?>

<section class="page">
    <div class="container">
        <div class="timeline">
            <?php
            foreach ($programs as $program):
            $items = Lists::where('list_type_id', 5)
                ->where('lists_category_id', $program->id)
                ->get();
            ?>
            <div class="time-label">
                <span class="bg-red">{{ $program->title ?? "" }}</span>
            </div>
            <?php foreach ($items as $item): ?>
            <div>
                <i class="fas fa-circle"></i>
                <div class="timeline-item">
                    <span class="time">
{{--                        <i class="fas fa-clock"></i>--}}
                        {{--                        {!! str_replace(['<p>', '</p>'], '', $item->description); !!}--}}
                    </span>
                    <h3 class="timeline-header alert-primary">
                        <span><?= $item->title ?></span>
                    </h3>
                    @if($item->content)
                        <div class="timeline-body">
                            <?= $item->content ?>
                        </div>
                    @else
                        <div class="timeline-body d-none">
                            <?= $item->content ?>
                        </div>
                    @endif

                </div>
            </div>
            <?php endforeach; ?>
            <?php endforeach; ?>

        </div>
</section>
