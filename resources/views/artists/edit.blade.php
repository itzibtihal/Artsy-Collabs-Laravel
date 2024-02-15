<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ArtsyCollabs - Update Artist</title>
    
    <style>
        body {
            color: #000;
            overflow-x: hidden;
            height: 100vh;
            background-image: url("https://th.bing.com/th/id/R.31125dd71269ff5d85a494d55ccc3cc1?rik=HyC7uPMjOhiy6Q&riu=http%3a%2f%2fwww.streetartutopia.com%2fwp-content%2fuploads%2f2012%2f11%2fStreet-Art-by-David-Walker-in-London-England.jpg&ehk=YNY%2fxJESZhQTnV0sWVt4x6ZSLow2U0jkJoZ4fBrUo8s%3d&risl=&pid=ImgRaw&r=0");
            background-repeat: no-repeat;
            background-size: 100% 100%;
        }

        .card {
            padding: 30px 40px;
            margin-top: 60px;
            margin-bottom: 60px;
            border: none !important;
            box-shadow: 0 6px 12px 0 rgba(0, 0, 0, 0.2);
        }

        .blue-text {
            color: #00BCD4;
        }

        .form-control-label {
            margin-bottom: 0;
        }

        input,
        textarea,
        button {
            padding: 8px 15px;
            border-radius: 5px !important;
            margin: 5px 0px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            font-size: 18px !important;
            font-weight: 300;
        }

        input:focus,
        textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: 1px solid #00BCD4;
            outline-width: 0;
            font-weight: 400;
        }

        .btn-block {
            text-transform: uppercase;
            font-size: 15px !important;
            font-weight: 400;
            height: 43px;
            cursor: pointer;
        }

        .btn-block:hover {
            color: #fff !important;
        }

        button:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            outline-width: 0;
        }
    </style>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
</head>

<body>
    <div class="container-fluid px-1 py-5 mx-auto">
        <div class="row d-flex justify-content-center">
            <div class="col-xl-7 col-lg-8 col-md-9 col-11 text-center">
                <div class="card">
                <form action="{{ route('artists.update', $artist->id) }}" method="post" enctype="multipart/form-data">
    @csrf
    @method('put') <!-- Use the 'put' method for updates -->

                        <!-- Profile Image -->
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <label class="form-control-label px-3"> Update Artist's Profile<span class="text-danger"> *</span></label>
                                <input type="file" name="profile" accept="image/*">
                                <!-- Display existing profile image -->
                               
                            </div>
                        </div>

                        <!-- Full Name and Phone Number -->
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Artist's Name<span class="text-danger"> *</span></label>
                                <input type="text" name="full_name" value="{{ $artist->full_name }}" required>
                            </div>
                            <div class="form-group col-sm-6 flex-column d-flex">
                                <label class="form-control-label px-3">Phone Number<span class="text-danger"> *</span></label>
                                <input type="text" name="phone_number" value="{{ $artist->phone_number }}" maxlength="20" required>
                            </div>
                        </div>

                      

                        <!-- Profession -->
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <label class="form-control-label px-3">Profession<span class="text-danger"> *</span></label>
                                <input type="text" name="profession" value="{{ $artist->profession }}" maxlength="255" required>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <label class="form-control-label px-3">Email<span class="text-danger"> *</span></label>
                                <input type="email" name="email" value="{{ $artist->email }}" required>
                            </div>
                        </div>

                        <!-- Password -->
                        <div class="row justify-content-between text-left">
                            <div class="form-group col-12 flex-column d-flex">
                                <label class="form-control-label px-3">Password<span class="text-danger"> *</span></label>
                                <input type="password" name="password" minlength="8" value="{{ $artist->password }}">
                                <small class="text-muted">Leave it blank to keep the current password.</small>
                            </div>
                        </div>

                        <!-- Status -->
                        <div class="row justify-content-between text-left">
    <div class="form-group col-12 flex-column d-flex">
        <label class="form-control-label px-3">Status<span class="text-danger"> *</span></label>
        <select name="status" required>
            <option value="0" @if($artist->status == 0) selected @endif><span class="badge badge-warning">Pending</span></option>
            <option value="1" @if($artist->status == 1) selected @endif><span class="badge badge-success">Approved</span></option>
            <option value="2" @if($artist->status == 2) selected @endif><span class="badge badge-danger">Banned</span></option>
        </select>
        
    </div>
</div>


                        <!-- Update Button -->
                        <div class="row justify-content-center">
                            <div class="form-group col-sm-6">
                                <button type="submit" class="btn-block" style="background-color: bisque;">Update</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</body>

</html>
