<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Lesson</title>
    <link rel="stylesheet" href="admin_manage_lesson_add_lesson.css">
</head>
<body>
<div id="contact-form">
  <div>
    <h1>Upload Lesson</h1> 

  </div>
    <p id="failure">Oopsie...message not sent.</p>  
    <p id="success">Your message was sent successfully. Thank you!</p>

    <form method="post" action="/">
    <div>
        <label for="title">
            <span class="required">Module/Lesson Name: *</span>
            <input type="text" id="title" name="title" value="" placeholder="Title" required="required" tabindex="1" autofocus="autofocus" />
        </label>
    </div>
    <div>
        <label for="objective">
            <span class="required">Lesson Description: *</span>
            <textarea id="objective" name="objective" placeholder="Please write objectives here." tabindex="5" required="required"></textarea>
        </label>
    </div>
    <div>
        <label for="category">
            <span>Category: </span>
            <select id="category" name="level" tabindex="4">
                <option value="literacy">Literacy</option>
                <option value="numeracy">Numeracy</option>
 
            </select>
        </label>
    </div>
    <div>
        <label for="level">
            <span>Level of Learning: </span>
            <select id="level" name="level" tabindex="4">
                <option value="basic">Basic</option>
                <option value="intermediate">Intermediate</option>
                <option value="advanced">Advanced</option>
            </select>
        </label>
    </div>
    <!-- <div>
        <label for="video">
            <span>Upload Video:</span>
            <input type="file" id="video" name="video" accept="video/*" tabindex="6">
        </label>
    </div>
    <div>
        <label for="audio">
            <span>Upload Audio:</span>
            <input type="file" id="audio" name="audio" accept="audio/*" tabindex="7">
        </label>
    </div>
    <div>
        <label for="files">
            <span>Upload Files:</span>
            <input type="file" id="files" name="files" accept=".pdf,.doc,.docx" tabindex="8" multiple>
        </label>
    </div> -->
</form>

      <div>              
          <button name="create" type="create" id="create" >Create Module</button> 
      </div>
       </form>

  </div>
</body>
</html>
