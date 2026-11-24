import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Participantes } from './participantes.component';

describe('Participantes', () => {
  let component: Participantes;
  let fixture: ComponentFixture<Participantes>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [Participantes]
    })
    .compileComponents();

    fixture = TestBed.createComponent(Participantes);
    component = fixture.componentInstance;
    await fixture.whenStable();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
