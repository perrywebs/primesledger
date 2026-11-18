<!doctype html>
<html lang="en" dir="ltr">
<head>
    @include('includes.admin-head')
</head>
<body class="app sidebar-mini ltr light-mode">
    @include('includes.loader')
    <div class="page">
        <div class="page-main">
            @include('includes.admin-nav')
            @include('includes.admin-sidebar')

            <div class="main-content app-content mt-0">
                <div class="side-app">
                    <div class="main-container container-fluid">
                        @include('includes.flash-alerts')

                        <div class="rg-page-head">
                            <div>
                                <span class="rg-eyebrow"><i class="fe fe-mail"></i> Customer communications</span>
                                <h1>Email users</h1>
                                <p>Prepare a branded message, review the email preview, then confirm the eligible recipients.</p>
                            </div>
                            <div class="rg-page-actions">
                                <span class="rg-chip rg-chip--neutral"><i class="fe fe-shield"></i> Admin only</span>
                            </div>
                        </div>

                        <form id="admin-email-form" method="POST" action="{{ route('admin_email_users_send') }}"
                            data-search-url="{{ route('admin_email_users_search') }}"
                            data-preview-url="{{ route('admin_email_users_preview') }}"
                            data-total="{{ $eligibleCount }}">
                            @csrf
                            <input type="hidden" name="form_nonce" value="{{ $formNonce }}">
                            <div id="recipient-hidden-inputs"></div>

                            <div class="row g-4">
                                <div class="col-xl-5">
                                    <section class="card email-panel" aria-labelledby="recipients-title">
                                        <div class="card-header">
                                            <div>
                                                <h2 class="card-title" id="recipients-title">1. Choose recipients</h2>
                                                <p class="rg-panel__sub mb-0">Only verified customer accounts can receive email.</p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <fieldset class="email-recipient-options">
                                                <legend class="form-label">Recipient group</legend>
                                                <label class="email-recipient-option">
                                                    <input type="radio" name="recipient_mode" value="all" checked>
                                                    <span>
                                                        <strong>All eligible users</strong>
                                                        <small>{{ number_format($eligibleCount) }} verified customer accounts</small>
                                                    </span>
                                                </label>
                                                <label class="email-recipient-option">
                                                    <input type="radio" name="recipient_mode" value="selected">
                                                    <span>
                                                        <strong>Selected users</strong>
                                                        <small>Choose multiple people from the searchable list</small>
                                                    </span>
                                                </label>
                                                <label class="email-recipient-option">
                                                    <input type="radio" name="recipient_mode" value="individual">
                                                    <span>
                                                        <strong>One individual user</strong>
                                                        <small>Find one verified customer by name or email</small>
                                                    </span>
                                                </label>
                                            </fieldset>

                                            <div id="user-picker" class="email-user-picker" hidden>
                                                <label class="form-label" for="user-search">Search eligible users</label>
                                                <input class="form-control" id="user-search" type="search" autocomplete="off"
                                                    placeholder="Name or email address">
                                                <div class="email-picker-actions">
                                                    <span id="search-summary" class="rg-muted" aria-live="polite">Loading users…</span>
                                                    <div id="multi-select-actions" class="d-flex gap-2" hidden>
                                                        <button type="button" class="btn btn-light btn-sm" id="toggle-visible-users">Select visible</button>
                                                        <button type="button" class="btn btn-light btn-sm" id="clear-selected-users">Clear</button>
                                                    </div>
                                                </div>
                                                <div id="user-results" class="email-user-results" role="group" aria-label="Eligible users"></div>
                                                <p id="individual-selection" class="email-selected-user" hidden aria-live="polite"></p>
                                                <p id="selection-count" class="email-selection-count" hidden aria-live="polite"></p>
                                            </div>

                                            <div class="email-recipient-total">
                                                <span><i class="fe fe-users"></i> Recipients for this email</span>
                                                <strong id="recipient-count">{{ number_format($eligibleCount) }}</strong>
                                            </div>
                                        </div>
                                    </section>
                                </div>

                                <div class="col-xl-7">
                                    <section class="card email-panel" aria-labelledby="compose-title">
                                        <div class="card-header">
                                            <div>
                                                <h2 class="card-title" id="compose-title">2. Compose your email</h2>
                                                <p class="rg-panel__sub mb-0">Your message will use the shared PrimesLedger email design.</p>
                                            </div>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="form-label" for="email-subject">Subject</label>
                                                <input class="form-control" type="text" id="email-subject" name="subject"
                                                    maxlength="255" required value="{{ old('subject') }}" placeholder="A clear subject for the inbox">
                                                @error('subject') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" for="email-heading">Email heading</label>
                                                <input class="form-control" type="text" id="email-heading" name="heading"
                                                    maxlength="255" required value="{{ old('heading') }}" placeholder="The main heading in your email">
                                                @error('heading') <small class="text-danger">{{ $message }}</small> @enderror
                                            </div>
                                            <div class="form-group">
                                                <label class="form-label" id="message-label">Message</label>
                                                <div class="email-editor">
                                                    <div class="email-editor-toolbar" role="toolbar" aria-label="Message formatting">
                                                        <button type="button" data-command="bold" aria-label="Bold"><strong>B</strong></button>
                                                        <button type="button" data-command="italic" aria-label="Italic"><em>I</em></button>
                                                        <button type="button" data-command="formatBlock" data-value="h2" aria-label="Heading">Heading</button>
                                                        <button type="button" data-command="insertUnorderedList" aria-label="Bulleted list">• List</button>
                                                        <button type="button" data-command="insertOrderedList" aria-label="Numbered list">1. List</button>
                                                        <button type="button" data-command="createLink" aria-label="Insert link"><i class="fe fe-link"></i> Link</button>
                                                    </div>
                                                    <div id="email-editor" class="email-editor-content" contenteditable="true"
                                                        role="textbox" aria-labelledby="message-label" aria-multiline="true"
                                                        data-placeholder="Write a clear, helpful message for your users…"></div>
                                                </div>
                                                <textarea id="email-message" name="message" hidden>{{ old('message') }}</textarea>
                                                <small class="rg-muted">Formatting is cleaned for safe email display. Avoid including sensitive account information.</small>
                                                @error('message') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                            </div>

                                            <div class="email-compose-footer">
                                                <span><i class="fe fe-eye"></i> Review the final design before sending.</span>
                                                <button class="btn btn-primary" type="button" id="preview-email">
                                                    <i class="fe fe-monitor"></i> Preview email
                                                </button>
                                            </div>
                                        </div>
                                    </section>
                                </div>
                            </div>
                        </form>

                        <div id="email-preview-modal" class="email-preview-modal" hidden role="dialog" aria-modal="true" aria-labelledby="preview-title">
                            <div class="email-preview-dialog">
                                <div class="email-preview-header">
                                    <div>
                                        <span class="rg-eyebrow">Final review</span>
                                        <h2 id="preview-title">Email preview</h2>
                                        <p id="preview-summary"></p>
                                    </div>
                                    <button type="button" class="btn btn-light btn-icon" id="close-preview" aria-label="Close preview">
                                        <i class="fe fe-x"></i>
                                    </button>
                                </div>
                                <div class="email-preview-subject">
                                    <strong>Subject</strong>
                                    <span id="preview-subject"></span>
                                </div>
                                <iframe id="email-preview-frame" title="Preview of the email users will receive" sandbox></iframe>
                                <div class="email-preview-confirm">
                                    <label><input type="checkbox" id="confirm-email-send"> I have reviewed this email and confirm the recipient count above.</label>
                                    <div class="d-flex flex-wrap justify-content-end gap-2">
                                        <button type="button" class="btn btn-light" id="cancel-email-send">Go back</button>
                                        <button type="button" class="btn btn-primary" id="confirm-email-button" disabled>
                                            <i class="fe fe-send"></i> Confirm and send
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('includes.admin-footer')
    </div>
    @include('includes.admin-script')

    <script>
        (() => {
            const form = document.getElementById('admin-email-form');
            const editor = document.getElementById('email-editor');
            const message = document.getElementById('email-message');
            const picker = document.getElementById('user-picker');
            const resultList = document.getElementById('user-results');
            const resultSummary = document.getElementById('search-summary');
            const recipientCount = document.getElementById('recipient-count');
            const selectionCount = document.getElementById('selection-count');
            const individualSelection = document.getElementById('individual-selection');
            const modal = document.getElementById('email-preview-modal');
            const selectedUsers = new Map();
            let visibleUsers = [];
            let individualUser = null;
            let searchTimer;

            editor.textContent = message.value;

            const selectedMode = () => document.querySelector('input[name="recipient_mode"]:checked').value;
            const recipientTotal = () => {
                if (selectedMode() === 'all') return Number(form.dataset.total);
                if (selectedMode() === 'individual') return individualUser ? 1 : 0;
                return selectedUsers.size;
            };

            const updateCount = () => {
                const count = recipientTotal();
                recipientCount.textContent = new Intl.NumberFormat().format(count);
                selectionCount.textContent = `${count} user${count === 1 ? '' : 's'} selected`;
                selectionCount.hidden = selectedMode() !== 'selected';
            };

            const renderUsers = () => {
                resultList.replaceChildren();
                if (visibleUsers.length === 0) {
                    const empty = document.createElement('p');
                    empty.className = 'email-empty-results';
                    empty.textContent = 'No eligible users found for this search.';
                    resultList.append(empty);
                    return;
                }

                visibleUsers.forEach((user) => {
                    const label = document.createElement('label');
                    label.className = 'email-user-result';
                    const input = document.createElement('input');
                    input.type = selectedMode() === 'individual' ? 'radio' : 'checkbox';
                    input.name = selectedMode() === 'individual' ? 'individual-user' : `user-${user.id}`;
                    input.checked = selectedMode() === 'individual'
                        ? individualUser?.id === user.id
                        : selectedUsers.has(user.id);
                    input.addEventListener('change', () => {
                        if (selectedMode() === 'individual') {
                            individualUser = user;
                            individualSelection.textContent = `Selected: ${user.first_name} ${user.last_name} · ${user.email}`;
                            individualSelection.hidden = false;
                        } else if (input.checked) {
                            selectedUsers.set(user.id, user);
                        } else {
                            selectedUsers.delete(user.id);
                        }
                        updateCount();
                        renderUsers();
                    });

                    const details = document.createElement('span');
                    details.className = 'email-user-result__details';
                    const name = document.createElement('strong');
                    name.textContent = `${user.first_name} ${user.last_name}`;
                    const email = document.createElement('small');
                    email.textContent = user.email;
                    details.append(name, email);
                    label.append(input, details);
                    resultList.append(label);
                });
            };

            const searchUsers = async (term = '') => {
                resultSummary.textContent = 'Searching eligible users…';
                try {
                    const url = new URL(form.dataset.searchUrl, window.location.origin);
                    if (term) url.searchParams.set('q', term);
                    const response = await fetch(url, { headers: { Accept: 'application/json' } });
                    if (!response.ok) throw new Error('Unable to search users.');
                    const data = await response.json();
                    visibleUsers = data.users;
                    resultSummary.textContent = `${new Intl.NumberFormat().format(data.total)} eligible users`;
                    renderUsers();
                } catch (error) {
                    resultSummary.textContent = 'Could not load users. Please try again.';
                    resultList.replaceChildren();
                }
            };

            document.querySelectorAll('input[name="recipient_mode"]').forEach((input) => {
                input.addEventListener('change', () => {
                    const mode = selectedMode();
                    picker.hidden = mode === 'all';
                    document.getElementById('multi-select-actions').hidden = mode !== 'selected';
                    individualSelection.hidden = mode !== 'individual' || !individualUser;
                    if (individualUser && mode === 'individual') {
                        individualSelection.textContent = `Selected: ${individualUser.first_name} ${individualUser.last_name} · ${individualUser.email}`;
                    }
                    updateCount();
                    if (mode !== 'all') {
                        renderUsers();
                        searchUsers(document.getElementById('user-search').value.trim());
                    }
                });
            });

            document.getElementById('user-search').addEventListener('input', (event) => {
                window.clearTimeout(searchTimer);
                searchTimer = window.setTimeout(() => searchUsers(event.target.value.trim()), 250);
            });

            document.getElementById('toggle-visible-users').addEventListener('click', () => {
                const shouldSelect = visibleUsers.some((user) => !selectedUsers.has(user.id));
                visibleUsers.forEach((user) => {
                    if (shouldSelect) selectedUsers.set(user.id, user);
                    else selectedUsers.delete(user.id);
                });
                updateCount();
                renderUsers();
            });

            document.getElementById('clear-selected-users').addEventListener('click', () => {
                selectedUsers.clear();
                updateCount();
                renderUsers();
            });

            document.querySelectorAll('.email-editor-toolbar button').forEach((button) => {
                button.addEventListener('click', () => {
                    editor.focus();
                    const command = button.dataset.command;
                    if (command === 'createLink') {
                        const url = window.prompt('Enter a full website link (https://…)');
                        if (url) document.execCommand(command, false, url);
                    } else {
                        document.execCommand(command, false, button.dataset.value || null);
                    }
                    message.value = editor.innerHTML;
                });
            });
            editor.addEventListener('input', () => { message.value = editor.innerHTML; });

            document.getElementById('preview-email').addEventListener('click', async () => {
                message.value = editor.innerHTML;
                if (!message.value.trim() || !editor.textContent.trim()) {
                    window.alert('Please write a message before previewing.');
                    return;
                }
                if (recipientTotal() < 1) {
                    window.alert('Please select at least one eligible recipient.');
                    return;
                }
                if (!form.reportValidity()) return;
                const button = document.getElementById('preview-email');
                button.disabled = true;
                button.innerHTML = '<i class="fe fe-loader"></i> Preparing preview…';
                try {
                    const data = new FormData();
                    data.append('_token', form.querySelector('[name="_token"]').value);
                    data.append('subject', form.querySelector('[name="subject"]').value);
                    data.append('heading', form.querySelector('[name="heading"]').value);
                    data.append('message', message.value);
                    const response = await fetch(form.dataset.previewUrl, {
                        method: 'POST',
                        headers: { Accept: 'text/html' },
                        body: data,
                    });
                    if (!response.ok) throw new Error('Please check the email fields and try again.');
                    document.getElementById('email-preview-frame').srcdoc = await response.text();
                    document.getElementById('preview-subject').textContent = form.querySelector('[name="subject"]').value;
                    document.getElementById('preview-summary').textContent =
                        `${new Intl.NumberFormat().format(recipientTotal())} recipient${recipientTotal() === 1 ? '' : 's'} will receive this email.`;
                    document.getElementById('confirm-email-send').checked = false;
                    document.getElementById('confirm-email-button').disabled = true;
                    modal.hidden = false;
                    document.body.classList.add('email-preview-open');
                } catch (error) {
                    window.alert(error.message);
                } finally {
                    button.disabled = false;
                    button.innerHTML = '<i class="fe fe-monitor"></i> Preview email';
                }
            });

            const closeModal = () => {
                modal.hidden = true;
                document.body.classList.remove('email-preview-open');
            };
            document.getElementById('close-preview').addEventListener('click', closeModal);
            document.getElementById('cancel-email-send').addEventListener('click', closeModal);
            document.getElementById('confirm-email-send').addEventListener('change', (event) => {
                document.getElementById('confirm-email-button').disabled = !event.target.checked;
            });
            document.getElementById('confirm-email-button').addEventListener('click', () => {
                const hiddenInputs = document.getElementById('recipient-hidden-inputs');
                hiddenInputs.replaceChildren();
                if (selectedMode() === 'selected') {
                    selectedUsers.forEach((user) => {
                        const input = document.createElement('input');
                        input.type = 'hidden';
                        input.name = 'user_ids[]';
                        input.value = user.id;
                        hiddenInputs.append(input);
                    });
                } else if (selectedMode() === 'individual' && individualUser) {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'recipient_id';
                    input.value = individualUser.id;
                    hiddenInputs.append(input);
                }
                message.value = editor.innerHTML;
                if (!message.value.trim() || !editor.textContent.trim()) {
                    closeModal();
                    window.alert('Please write a message before sending.');
                    return;
                }
                if (recipientTotal() < 1) {
                    closeModal();
                    window.alert('Please select at least one eligible recipient.');
                    return;
                }
                document.getElementById('confirm-email-button').disabled = true;
                form.requestSubmit();
            });

            searchUsers();
            updateCount();
        })();
    </script>
</body>
</html>
