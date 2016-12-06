@extends("layouts.main")

@section("content")
    <!-- Portfolio Item Row -->
    <div class="row">

        <div class="col-md-8">
            <img class="img-responsive" src="{{ getThumbnail("project.jpg", 750, 500, "fit") }}" alt="">
        </div>

        <div class="col-md-4">
            <h3>Project Description</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque
                urna varius vitae. Sed dui lorem, adipiscing in adipiscing et, interdum nec metus. Mauris ultricies,
                justo eu convallis placerat, felis enim.</p>
            <h3>Project Details</h3>
            <ul>
                <li>Lorem Ipsum</li>
                <li>Dolor Sit Amet</li>
                <li>Consectetur</li>
                <li>Adipiscing Elit</li>
            </ul>
        </div>

    </div>
    <!-- /.row -->

    <!-- Related Projects Row -->
    <div class="row">

        <div class="col-lg-12">
            <h3 class="page-header">Related Projects</h3>
        </div>

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive portfolio-item" src="{{ getThumbnail("projects/project-1.jpg", 500, 300, "background") }}" alt="">
            </a>
        </div>

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive portfolio-item" src="{{ getThumbnail("projects/project-2s.jpg", 500, 300, "background") }}" alt="">
            </a>
        </div>

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive portfolio-item" src="{{ getThumbnail("projects/project-3.jpg", 500, 300, "background") }}" alt="">
            </a>
        </div>

        <div class="col-sm-3 col-xs-6">
            <a href="#">
                <img class="img-responsive portfolio-item" src="{{ getThumbnail("projects/project-4.jpg", 500, 300, "background") }}" alt="">
            </a>
        </div>

    </div>
    <!-- /.row -->

@endsection

