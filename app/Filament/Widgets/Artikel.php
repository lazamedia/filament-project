<?php

namespace App\Filament\Widgets;

use App\Models\Article;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;


class Artikel extends BaseWidget
{
    public function table(Table $table): Table

    {
        return $table
            ->query(Article::query())
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->label('Title')
                    ->sortable()
                    ->limit(50)
                    ->columnSpan(2),

                // Tables\Columns\TextColumn::make('created_at')
                //     ->label('Created At')
                //     ->date()
                //     ->sortable()
                //     ->columnSpan(1), 

                Tables\Columns\TextColumn::make('user.name') 
                    ->label('Created By')
                    ->sortable()
                    ->limit(10)
                    ->columnSpan(1),
            ])
            ->defaultSort('created_at', 'desc'); 
    }
}
