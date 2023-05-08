<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Project extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'title',
        'client',
        'description',
        'url',
        'slug',
        'date_creation',
        'type_id'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function technologies()
    {

        return $this->belongsToMany(Technology::class)->orderBy('name', 'asc'); // aggiungo la possibilità di ordinare le tecnologie usate direttamente dalla funzione in modo tale da non doverlo scrivere nel forelse quando utilizzo technologies
        // questa aggiunta vale nel caso in cui volgio tutti i dati con la stessa caratteristica e non ho eccezioni. Se ho altri comportamenti meglio utilizzare una chiamata generica e poi fare caso specifico 
    }
    public function getTechIds()
    {
        return $this->technologies->pluck('id')->all();
    }
    public function getRelatedProjects()
    {
        return $this->type->projects()->where('id', '!=', $this->id)->get();
    }
}
