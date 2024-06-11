<x-admin-layout>
  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <h3>Student Results</h3>
      <div class="d-flex justify-content-between align-items-center mb-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#subjectSelectionModal">
          Select Subject
        </button>
      </div>

      <div class="modal fade" id="subjectSelectionModal" tabindex="-1" aria-labelledby="subjectSelectionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="subjectSelectionModalLabel">Select Subject</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <form action="#" method="post"> @csrf
                <div class="mb-3">
                  <label for="subject" class="form-label">Subject</label>
                  <select class="form-select" id="subject" name="subject">
                    <option value="quran_citation">Quran Citation</option>
                    <option value="quran_memorization">Quran Memorization</option>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</x-admin-layout>