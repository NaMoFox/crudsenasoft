<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Tienda\BulkDestroyTienda;
use App\Http\Requests\Admin\Tienda\DestroyTienda;
use App\Http\Requests\Admin\Tienda\IndexTienda;
use App\Http\Requests\Admin\Tienda\StoreTienda;
use App\Http\Requests\Admin\Tienda\UpdateTienda;
use App\Models\Tienda;
use Brackets\AdminListing\Facades\AdminListing;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class TiendaController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @param IndexTienda $request
     * @return array|Factory|View
     */
    public function index(IndexTienda $request)
    {
        // create and AdminListing instance for a specific model and
        $data = AdminListing::create(Tienda::class)->processRequestAndGet(
            // pass the request with params
            $request,

            // set columns to query
            ['id'],

            // set columns to searchIn
            ['id']
        );

        if ($request->ajax()) {
            if ($request->has('bulk')) {
                return [
                    'bulkItems' => $data->pluck('id')
                ];
            }
            return ['data' => $data];
        }

        return view('admin.tienda.index', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function create()
    {
        $this->authorize('admin.tienda.create');

        return view('admin.tienda.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreTienda $request
     * @return array|RedirectResponse|Redirector
     */
    public function store(StoreTienda $request)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Store the Tienda
        $tienda = Tienda::create($sanitized);

        if ($request->ajax()) {
            return ['redirect' => url('admin/tiendas'), 'message' => trans('brackets/admin-ui::admin.operation.succeeded')];
        }

        return redirect('admin/tiendas');
    }

    /**
     * Display the specified resource.
     *
     * @param Tienda $tienda
     * @throws AuthorizationException
     * @return void
     */
    public function show(Tienda $tienda)
    {
        $this->authorize('admin.tienda.show', $tienda);

        // TODO your code goes here
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Tienda $tienda
     * @throws AuthorizationException
     * @return Factory|View
     */
    public function edit(Tienda $tienda)
    {
        $this->authorize('admin.tienda.edit', $tienda);


        return view('admin.tienda.edit', [
            'tienda' => $tienda,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateTienda $request
     * @param Tienda $tienda
     * @return array|RedirectResponse|Redirector
     */
    public function update(UpdateTienda $request, Tienda $tienda)
    {
        // Sanitize input
        $sanitized = $request->getSanitized();

        // Update changed values Tienda
        $tienda->update($sanitized);

        if ($request->ajax()) {
            return [
                'redirect' => url('admin/tiendas'),
                'message' => trans('brackets/admin-ui::admin.operation.succeeded'),
            ];
        }

        return redirect('admin/tiendas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param DestroyTienda $request
     * @param Tienda $tienda
     * @throws Exception
     * @return ResponseFactory|RedirectResponse|Response
     */
    public function destroy(DestroyTienda $request, Tienda $tienda)
    {
        $tienda->delete();

        if ($request->ajax()) {
            return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resources from storage.
     *
     * @param BulkDestroyTienda $request
     * @throws Exception
     * @return Response|bool
     */
    public function bulkDestroy(BulkDestroyTienda $request) : Response
    {
        DB::transaction(static function () use ($request) {
            collect($request->data['ids'])
                ->chunk(1000)
                ->each(static function ($bulkChunk) {
                    Tienda::whereIn('id', $bulkChunk)->delete();

                    // TODO your code goes here
                });
        });

        return response(['message' => trans('brackets/admin-ui::admin.operation.succeeded')]);
    }
}
