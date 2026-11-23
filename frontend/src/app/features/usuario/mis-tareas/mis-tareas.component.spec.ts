import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MisTareas } from './mis-tareas.component';

describe('MisTareas', () => {
  let component: MisTareas;
  let fixture: ComponentFixture<MisTareas>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [MisTareas]
    })
    .compileComponents();

    fixture = TestBed.createComponent(MisTareas);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
