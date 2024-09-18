<!DOCTYPE html>
<html lang="en">
@include('admin.includes.head')
@include('admin.includes.header')
@include('admin.includes.footer')

<body>
<div class="container my-5">
    <div class="mx-2">
        <div class="row justify-content-between mb-2 pb-2">
            <h2 class="fw-bold fs-2 col-auto">Unread Messages</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-borderless display" id="_table">
                <thead>
                    <tr>
                        <th scope="col">Created At</th>
                        <th scope="col">Message</th>
                        <th scope="col">Sender</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($unreadMessages as $message)
                    <tr>
                        <th scope="row">{{ $message->created_at->format('d M Y') }}</th>
                        <td>
                            <a href="{{ route('admin.messages.show', $message->id) }}" class="text-decoration-none text-dark">
                                {{ Str::limit($message->body, 100) }}
                            </a>
                        </td>
                        <td>{{ $message->sender_name ?? 'Unknown' }}</td>
                        <td class="text-center">
                            <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link p-0 text-dark">
                                    <img src="{{ asset('admin/assests/images/trash-can-svgrepo-com.svg') }}" alt="Delete">
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <hr>

    <div class="mx-2">
        <div class="row justify-content-between mb-2 pb-2">
            <h2 class="fw-bold fs-2 col-auto">Read Messages</h2>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-borderless display" id="_table2">
                <thead>
                    <tr>
                        <th scope="col">Created At</th>
                        <th scope="col">Message</th>
                        <th scope="col">Sender</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($readMessages as $message)
                    <tr>
                        <th scope="row">{{ $message->created_at->format('d M Y') }}</th>
                        <td>
                        <a href="{{ route('admin.messages.show', $message->id) }}" class="text-decoration-none text-dark">
                            {{ Str::limit($message->body, 100) }}
                        </a>
                        </td>
                        <td>{{ $message->sender_name ?? 'Unknown' }}</td>
                        <td class="text-center">
                        <form action="{{ route('admin.messages.destroy', $message->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this message?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link p-0 text-dark">
                                    <img src="{{ asset('admin/assests/images/trash-can-svgrepo-com.svg') }}" alt="Delete">
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>
  