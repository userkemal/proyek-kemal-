# TODO

## Bug: MethodNotAllowed (POST not supported for route dashboard)
- [x] Check routes/web.php: route dashboard is defined as GET only at `/dashboard` with name `user.dashboard`.
- [ ] Find where POST is being sent to `/dashboard` (likely a form action/redirect targeting wrong route name like `dashboard` instead of `pendaftaran.store` or `user.dashboard`).
- [ ] Fix the target: ensure POST form uses `route('pendaftaran.store')` (POST `/pendaftaran/simpan`) and redirects use `route('user.dashboard')`.
- [ ] If there is a route named `dashboard` elsewhere, make it accept POST or correct naming consistency.
- [ ] Clear caches and test POST submission.

