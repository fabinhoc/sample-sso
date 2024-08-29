<?php

namespace App\Http\Controllers;

use App\Enums\SSORolesEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        Gate::authorize('viewAny', User::class);
        $perPage = (isset($request->itemsPerPage)) ? $request->itemsPerPage : 3;
        $column = (isset($request->sortBy) && !empty($request->sortBy)) ? $request->sortBy : 'id';
        $direction = (isset($request->sortDesc) && filter_var($request->sortDesc, FILTER_VALIDATE_BOOLEAN)) ? 'DESC' : 'ASC';

        $users = User::with(['tenant'])
            ->filter($request->all())
            ->SsoFilterUsers()
            ->orderBy($column, $direction)
            ->paginate($perPage);

        return Inertia::render('User/Users', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
