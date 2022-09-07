<?php

namespace App\Http\Controllers;

use App\Borrower;
use App\Helpers\AndresReyesDev;
use App\Http\Requests\BorrowerRequest;
use App\Jobs\SendEmail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return array
     */
    public function index()
    {
        return array_reverse(Borrower::all()->toArray());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BorrowerRequest $request
     * @return JsonResponse
     */
    public function store(BorrowerRequest $request)
    {
        $borrower = new Borrower();
        $borrower->fill($request->all());
        $borrower->steps = json_encode(AndresReyesDev::steps());

        if ($borrower->save()) {
            dispatch(new SendEmail($borrower));
        }

        return response()->json('Borrower created!');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show($id)
    {
        return response()->json(Borrower::find($id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return void
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param BorrowerRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(BorrowerRequest $request, $id)
    {
        $borrower = Borrower::find($id);
        $borrower->fill($request->all());
        $borrower->steps = json_encode(AndresReyesDev::steps());
        $borrower->update();

        return response()->json('Borrower updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy($id)
    {
        Borrower::find($id)->delete();
        return response()->json(['Borrower Deleted!']);
    }
}
