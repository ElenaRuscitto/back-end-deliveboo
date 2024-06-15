@extends('layouts.admin')


@section('content')

    <div class="container">
        <h1 class="text-center">I miei ordini</h1>



        <table class="table">

            <thead>
            <tr>

                <th scope="col">ID</th>
                <th scope="col">Codice</th>
                <th scope="col">Data</th>
                <th scope="col">Nome</th>
                <th scope="col">Indirizzo</th>
                <th scope="col">Email</th>
                <th scope="col">Totale</th>
                <th scope="col" class="text-center">Azioni</th>
            </tr>
            </thead>
            <tbody>

                <tr>

                    <form>
                        {{-- id --}}
                        <th class=" align-content-center ">
                            <input
                                type="text"
                                class="form-control p-0 w-50"
                                name="title"
                                value="0000">
                        </th>

                        {{-- codice --}}
                        <td class=" align-content-center ">
                            <input
                                type="text"
                                class="form-control p-0"
                                name="type"
                                value="1234">
                        </td>


                        {{-- data --}}
                        <td class=" align-content-center ">
                            <input
                                type="text"
                                class="form-control p-0"
                                name="link"
                                value="12/12/2022">
                        </td>

                        {{-- nome --}}
                        <td class=" align-content-center ">
                            <input
                                type="text"
                                class="form-control p-0"
                                name="link"
                                value="Elena">
                        </td>

                        {{-- indirizzo --}}
                        <td class=" align-content-center ">
                            <input
                                type="text"
                                class="form-control p-0"
                                name="link"
                                value="Via Angelo Emo, 55">
                        </td>

                        {{-- email --}}
                        <td class=" align-content-center ">
                            <input
                                type="text"
                                class="form-control p-0"
                                name="link"
                                value="ele@gmail.com">
                        </td>

                        {{-- totale --}}
                        <td class=" align-content-center ">
                            <input
                                type="text"
                                class="form-control p-0"
                                name="link"
                                value="€ 35,00">
                        </td>

                        {{-- azioni --}}
                        <td class="d-flex justify-content-center align-items-center ">


                                    <a href="" class="btn btn-primary me-2">
                                    <i
                                class="fa-solid fa-eye"></i>
                            </a>
                            {{-- modifica ordine --}}
                            {{-- <a href="" class="btn btn-warning my-2"><i
                                class="fa-solid fa-pen"></i></a> --}}

                    </form>
                                {{-- cancella ordine --}}
                                {{-- <form>

                                        <button
                                            type="submit"
                                            class="btn btn-danger mx-2"
                                            >
                                            <i class="fa-solid fa-trash"></i>
                                        </button>
                                </form> --}}

                        </td>


                </tr>



            </tbody>


        </table>
    </div>

@endsection
