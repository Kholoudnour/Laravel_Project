<!DOCTYPE html>
<html lang="en">

@include('admin.includes.head')
@include('admin.includes.header')
@include('admin.includes.footer')

<body>

<div class="container my-5">
        <div class="mx-2">
            <div class="row justify-content-between mb-2 pb-2">
                <h2 class="fw-bold fs-2 col-auto">All Topics</h2>
                <a href="{{ route('topic.create') }}" class="btn btn-link  link-dark fw-semibold col-auto me-3">➕Add new topic</a>
            </div>
            <div class="table-responsive">
                <table class="table table-hover display" id="_table">
                    <thead>
                        <tr>
                            <th scope="col">Created At</th>
                            <th scope="col">Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Content</th>
                            <th scope="col">No. of views</th>
                            <th scope="col">Published</th>
                            <th scope="col">Trending</th>
                            <th scope="col">Show</th>
                            <th scope="col">Edit</th>
                            <th scope="col">Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($topics as $topic)
                        <tr>
                                <th scope="row">~{{$topic['created_at']}}</th>
                            <td><a class="text-decoration-none text-dark" href="{{ route('topic.show', $topic['id']) }}">{{ $topic->title }}</a></td>
                            <td>{{ $topic->category }}</td>
                            <td>{{ Str::limit($topic->content, 10) }}...</td>
                            <td>{{ $topic->views ?? 10 }}</td>
                            <td>{{$topic['published']=="1" ? "Yes": "NO"}}</td> 
                            <td>{{$topic['trending']=="1" ? "Yes": "NO"}}</td>
                            <td><a href= "{{route('topic.show', $topic['id'])}}">Show</a></td>

                            <td class="text-center"><a class="text-decoration-none text-dark" href="{{ route('topic.edit', $topic->id) }}"><img src="{{asset('admin/assests/images/edit-svgrepo-com.svg')}}"></a></td>
                            <td class="text-center">
                            <form action="{{route('topic.destroy',$topic['id'])}}" method="post">
                      @csrf
                      @method('DELETE')
                     <button type="submit" value="delete" onclick="return confirm('Are you sure ?')"
                                 class="text-decoration-none text-dark" href="#"><img src="{{asset('admin/assests/images/trash-can-svgrepo-com.svg')}}"></a></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
 