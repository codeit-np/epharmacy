@extends('frontend.app')

@section('content')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact us</h1>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Ratione ad voluptatem optio natus doloribus dignissimos officia perspiciatis cum corrupti voluptatum quam excepturi aspernatur ut recusandae quisquam nisi ipsam in iure, molestiae, neque blanditiis id voluptates sequi? Magni possimus maxime eum cumque molestiae voluptate molestias voluptates dicta alias incidunt! Non, eius!</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        Contact us
                    </div>
                    <div class="card-body">
                        <form action="/contacts" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input id="name" class="form-control" type="text" name="name">
                            </div>

                            <div class="form-group">
                                <label for="mobile">Mobile</label>
                                <input id="mobile" class="form-control" type="text" name="mobile">
                            </div>

                           <div class="form-group">
                               <label for="message">Message</label>
                               <textarea id="message" class="form-control" name="message" rows="3"></textarea>
                           </div>

                           <button type="submit" class="btn btn-danger btn-sm">Send Message</button>
                        </form>

                    @if (session('message'))
                        <div class="alert alert-success alert-sm my-2">{{ session('message') }}</div>
                    @endif
                    </div>
                </div>
            </div>

            <div class="col-md-8">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6820.485782680194!2d87.13715611052888!3d26.60350541713391!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39ef12988bf171a1%3A0x33c4e3386c3a8a43!2sDuhabi%20Road%2C%20Inaruwa!5e0!3m2!1sen!2snp!4v1618633476834!5m2!1sen!2snp" class="w-100" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
            </div>
        </div>
    </div>
@endsection