import { ComponentFixture, TestBed } from '@angular/core/testing';

import { TareasAdmin } from './tareas-admin.component';

describe('TareasAdmin', () => {
  let component: TareasAdmin;
  let fixture: ComponentFixture<TareasAdmin>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [TareasAdmin]
    })
    .compileComponents();

    fixture = TestBed.createComponent(TareasAdmin);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
