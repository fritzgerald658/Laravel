<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @vite('resources/css/app.css')
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> --}}
    <title>Document</title>
</head>

<body>
    <div class="container mx-auto flex justify-center items-center h-[100vh]">
        <div class="container mx-auto bg-white h-[70vh] w-[50vw] p-6 rounded-[1rem] ">
            <h1 class="text-center font-notosans">TO DO</h1>
            <div class="container">
                {{-- form for adding todo tasks --}}
                <form method="POST" id="add">
                    @csrf
                    @method('post')
                    <input class="font-notosans w-[100%] bg-[#E9EFEC] text-black py-2 px-3 mt-6 rounded-[0.5rem]"
                        type="text" name="task_title" placeholder="Title">
                    <textarea name="task_description" id="text_description" cols="10" rows="5"
                        class="font-notosans w-[100%] bg-[#E9EFEC] text-black py-2 px-3 mt-6 rounded-[0.5rem]"></textarea>
                    <input class="bg-black cursor-pointer text-white py-1 px-4 rounded" type="submit" name="submit"
                        value="Add">
                </form>
                <div id="message-container"></div>
            </div>
            <div class="container w-[100%]" id="task-list-container">
                {{-- <form id="delete" method="post" action="home/${response.id}">
                    <input type="hidden" name="_token" value="${response.csrf_token}">
                    <input type="hidden" name="_method" value="delete">
               <button type="submit" name="submit">❌</button> --}}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#add').on('submit', function(e) {
                e.preventDefault();
                let form = $(this);
                let formdata = new FormData(this);
                console.log(formdata);
                $.ajax({
                    type: "post",
                    url: "{{ route('todo.store') }}",
                    data: $(this).serialize(),
                    success: function(response) {
                        console.log('success');
                        $('#task-list-container').append(
                            `<div
                        class="container flex items-center px-3 border-grey rounded-[0.5rem] mt-5 border-[1px] task-completed ${response.is_completed ? 'bg-green-500' : ''}">
                        <form method="POST" id="update" action="home/${response.id}"
                            class="p-2 px-5 flex justify-between flex-row w-[100%]">
                             <input type="hidden" name="_token" value="${response.csrf_token}">
                             <input type="hidden" name="_method" value="PATCH">
                            @method('patch')
                            <div>
                                <h1 class="font-bold">${response.task_title}</h1>
                                <p>${response.task_description}</p>
                            </div>
                            <button type="submit" name="submit">✔</button>
                        </form>
                        <form id="delete" method="post" action="home/${response.id}">
                             <input type="hidden" name="_token" value="${response.csrf_token}">
                             <input type="hidden" name="_method" value="delete">
                        <button type="submit" name="submit">❌</button>
                        </form>
                        </div>`
                        );
                        $('#add')[0].reset();
                    },

                });

            });
            $('#task-list-container').on('submit', '#update', function(e) {
                e.preventDefault();

                const updateform = $(this);
                $.ajax({
                    type: updateform.attr('method'),
                    url: updateform.attr('action'),
                    data: updateform.serialize(),
                    success: function(response) {
                        const formContainer = updateform.closest('.task-completed');

                        if (response.is_completed) {
                            formContainer.addClass('bg-green-500');
                        } else {
                            formContainer.removeClass('bg-green-500');
                        }
                    }
                });
            })

            $('#task-list-container').on('submit', '#delete', function(e) {
                e.preventDefault();

                const deleteForm = $(this);
                $.ajax({
                    type: deleteForm.attr('method'),
                    url: deleteForm.attr('action'),
                    data: deleteForm.serialize(),
                    success: function(response) {
                        deleteForm.closest('.task-completed').remove();
                        console.log('any')
                    }
                })
            })
        });
    </script>
</body>

</html>
