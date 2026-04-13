# Roles & Permissions System Plan

## Overview

A role and department-based permission system using `spatie/laravel-permission`.
Permissions are mapped 1:1 to named routes, organized by module. A UI graph
allows toggling permissions per role or department.

---

## Roles

| Role | Description |
|------|-------------|
| `superadmin` | Full access — bypasses all checks via `Gate::before` |
| `admin` | Manages users, departments, settings |
| `staff` | Department-based permissions (merged across all departments) |
| `client` | Scoped to own data via Policies |

---

## Architecture Decisions

- **Permission = Route name** (e.g. `reports.index`, `invoices.create`)
- **Staff** can belong to multiple departments; permissions merge (union)
- **Department permission change** triggers a sync to all staff in that dept
- **RouteServiceProvider** loads module route files from `routes/modules/`
- **Gate::before** grants superadmin unrestricted access
- **Policies** used for client-scoped model access
- **UI graph** shows routes grouped by module with toggle per role/department

---

## Route Convention

```
routes/
├── web.php
├── auth.php
└── modules/
    ├── modulea.php
    ├── moduleb.php
    └── ...
```

Named routes follow: `{module}.index|create|store|show|edit|update|destroy`

---

## Database Schema

```
users
departments          — id, name, slug
department_user      — user_id, department_id (pivot)

# Spatie (auto-migrated):
roles
permissions
model_has_roles        — user → role
model_has_permissions  — user/department → permission
role_has_permissions   — role → permission
```

---

## Phases & Progress

### Phase 1 — Foundation
- [ ] Install `spatie/laravel-permission`
- [ ] Publish & run Spatie migrations
- [ ] Create `Department` model, migration, factory, seeder
- [ ] Create `department_user` pivot migration
- [ ] Create `RouteServiceProvider` (auto-loads `routes/modules/*.php`)
- [ ] Add `HasRoles` trait to `User` model
- [ ] Add `departments()` relationship to `User` model
- [ ] Seed: roles (`superadmin`, `admin`, `staff`, `client`) and base permissions
- [ ] `Gate::before` for superadmin bypass in `AppServiceProvider`

### Phase 2 — Sync Logic
- [ ] Create `DepartmentPermissionSyncer` service class
- [ ] Department observer — on permission change, sync all staff in dept
- [ ] Staff permission merge helper (union across all departments)

### Phase 3 — UI (Permission Graph)
- [ ] Permission graph page — roles view (route list × role columns)
- [ ] Permission graph page — departments view (route list × dept columns)
- [ ] Department CRUD (index, create, edit, delete)
- [ ] User role & department assignment UI

### Phase 4 — Route Protection
- [ ] Create module route files (`routes/modules/modulea.php`, etc.)
- [ ] Apply permission middleware per module route group
- [ ] Policies for client-scoped resources

### Phase 5 — Tests
- [ ] Role assignment tests
- [ ] Department permission sync tests
- [ ] Route access tests per role
- [ ] Superadmin bypass test
- [ ] Client policy scope tests

---

## Notes

- Module names TBD — confirm what modules this system will manage
- UI graph: superadmin column is always locked (all ✓, not editable)
- `client` role uses Policies, not route-permission middleware
