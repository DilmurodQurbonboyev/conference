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
                    <span class="bg-red">{{ $items[0]->category->title ?? "" }}</span>
                </div>
            <?php foreach ($items as $item): ?>
            <div>
                <i class="fas fa-circle"></i>
                <div class="timeline-item">
                    <h3 class="timeline-header">
                        <span>{{ $item->title ?? '' }}</span>
                    </h3>
                    <div class="timeline-body">
                        {!! $item->content ?? '' !!}
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php endforeach; ?>
        </div>
    </div>
</section>
