<?php

namespace App\Policies;

use App\Models\Article;
use Illuminate\Contracts\Auth\Authenticatable as Patient;
use Illuminate\Auth\Access\Response;

class ArticlePolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(Patient $patient): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     */
    public function view(Patient $patient, Article $article): bool
    {
        return true;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(Patient $patient): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     */
    public function update(Patient $patient, Article $article): bool
    {
        return true;
    }

    /**
     * Determine whether the user can delete the model.
     */
    public function delete(Patient $patient, Article $article): bool
    {
        return true;
    }

    /**
     * Determine whether the user can restore the model.
     */
    public function restore(Patient $patient, Article $article): bool
    {
        return true;
    }

    /**
     * Determine whether the user can permanently delete the model.
     */
    public function forceDelete(Patient $patient, Article $article): bool
    {
        return true;
    }
}
